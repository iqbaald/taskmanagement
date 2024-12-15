<td class="align-middle">
    <span>
        @php
            $roles = [
                1 => 'Project Manager',
                2 => 'Programmer',
                3 => 'Designer',
                4 => 'Content Creator'
            ];
        @endphp
        {{ $roles[$user->role] ?? 'Role Tidak Dikenal' }}
    </span>
</td>