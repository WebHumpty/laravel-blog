<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

/**
 * Class Viewing
 * @package App\Helpers
 */
class Viewing
{
    /** @var string  */
    public const RECENT_COOKIE_KEY = '_rck';

    /** @var int  */
    private int $id;

    /** @var string  */
    private string $key;

    /** @var int  */
    private int $length;

    /** @var int  */
    private int $cookieTime;

    /** @var string|null  */
    private ?string $stringIds = null;

    /** @var array  */
    private array $arrIds = [];

    /**
     * создать экземпляр класса
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * установить параметры
     */
    public function init(int $id, int $length, ?int $cookieTime = null): self
    {
        $this->id = $id;
        $this->key = self::RECENT_COOKIE_KEY;
        $this->length = $length;
        $this->cookieTime = $cookieTime ?? (time() * 3600 * 24 * 1);

        return $this;
    }

    /**
     * установить новый ключ кук
     */
    public function setKey(string $newKey): self
    {
        $this->key = $newKey;

        return $this;
    }

    /**
     * добавить id в куки просмотра
     */
    public function addView(): void
    {
        $this->setStringIds();
        $this->setArrayIds();
        $this->addIdToArray();
        $this->setCookie();
    }

    /**
     * получить стоку с ids из кук
     */
    private function setStringIds(): void
    {
        $this->stringIds = Cookie::has($this->key)
            ? Cookie::get($this->key)
            : null;
    }

    /**
     * получить массив ids из строки
     */
    private function setArrayIds(): void
    {
        if (!empty($this->stringIds)) {
            $this->arrIds = Str::of($this->stringIds)
                ->explode('.')
                ->toArray();
        }
    }

    /**
     * добавить новый id в массив, если его нет в массиве
     * если длинна больше установленной,
     * удалить первый элемент, и добавить в конец новый id
     */
    private function addIdToArray(): void
    {
        if (!$this->checkIdInArray()) {
            if ($this->isSizeExceeded()) {
                array_shift($this->arrIds);
            }

            $this->arrIds[] = $this->id;
        }
    }

    /**
     * проверить, есить ли id в массиве
     */
    private function checkIdInArray(): bool
    {
        return in_array($this->id, $this->arrIds);
    }

    /**
     * проверить длинну массива
     */
    private function isSizeExceeded(): bool
    {
        return (count($this->arrIds) === $this->length);
    }

    /**
     * установить куку с просмотренными id
     */
    private function setCookie(): void
    {
        Cookie::queue($this->key, implode('.', $this->arrIds), $this->cookieTime);
    }

    /**
     * вернуть массив просмотренных id из кук
     */
    public function getCookieIds(): array
    {
        $this->setStringIds();
        $this->setArrayIds();

        return (!empty($this->stringIds) && !empty($this->arrIds))
            ? $this->arrIds
            : [];
    }
}
