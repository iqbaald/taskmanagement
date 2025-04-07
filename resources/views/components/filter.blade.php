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
