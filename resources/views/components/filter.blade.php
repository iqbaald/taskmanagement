<h5 class="mt-4">Filter Tugas</h5>
<div class="filter-box mb-4">
    <form method="GET" action="{{ route('todo') }}" class="filter_form">
        <div class="row justify-between box-filter">
            <div class="col-md-4">
                <label class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua</option>
                    <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Selesai</option>
                    <option value="not_done" {{ request('status') == 'not_done' ? 'selected' : '' }}>Belum Selesai</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="date" 
                    value="{{ request('date', \Carbon\Carbon::today()->toDateString()) }}">
            </div>

            <div class="col-md-3">
                <label class="form-label">Action</label>
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary me-2">Filter</button>
                        <a href="{{ route('todo') }}" class="btn btn-primary">Reset</a>
                </div>                
            </div>
        </div>
    </form>
</div>



<div class="cat-section" style="background-image: url('<?php echo esc_url($image_url); ?>');">

    <div class="overflow-hidden">
        <div class="naik">
            <h2 class="notranslate"><?php echo esc_html($category->name); ?></h2>
            <a href="<?php echo esc_url($link); ?>" class="btx btx-new-card btx-primary">View Catalog</a>
        </div>
    </div>

</div>



<div class="innerarsip">
	
	<a href="<?php echo get_permalink()?>">
		<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
	</a>
    <div class="overflow-hidden">
        <div class="naik">
            <h2 class="arsiptitle">
                <a href="<?php echo get_permalink()?>">
                <?php echo get_the_title(); ?>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                    <path d="M5 12l14 0"></path>
                    <path d="M15 16l4 -4"></path>
                    <path d="M15 8l4 4"></path>
                  </svg>
            </h2>            
        </div>
    </div>

</div>
