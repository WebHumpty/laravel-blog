<div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <form action="{{ route('blogs.posts.search') }}" method="get" class="search-form">
            <div class="input-group col-md-12">
                <input id="search" name="search" value="" type="text" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
