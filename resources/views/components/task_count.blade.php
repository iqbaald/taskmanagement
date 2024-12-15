@php
    $taskCount = $user->task_count;
    $badgeClass = '';
    $statusText = '';

    if($taskCount < 3) {
        $badgeClass = 'bg-success';
        $statusText = 'Rendah';
    } elseif ($taskCount >= 4 && $taskCount <= 6){
        $badgeClass = 'bg-warning';
        $statusText = 'Sedang';
    } else {
        $badgeClass = 'bg-danger';
        $statusText = 'Tinggi';
    }
@endphp

<h6 class="mb-0">
    <span class="badge {{ $badgeClass }}">
        {{ $statusText }}
    </span>
</h6>