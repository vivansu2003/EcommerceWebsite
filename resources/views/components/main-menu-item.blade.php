@if (count($list_menu_sub) == 0)
    <li class="nav-item" style="list-style-type: none;">
        <a class="nav-link" href="{{ $menu->link }}"
            style="font-size: 16px; padding: 10px; color: black;">{{ $menu->name }}</a>
    </li>
    <style>
        .nav-link:hover {
            background-color: rgb(199, 243, 155);
            border-radius: 15px;
        }
    </style>
@else
    <li class="nav-item dropdown" style="list-style-type: none;">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
            style="font-size: 16px; padding: 10px; color: rgb(17, 16, 16);">
            {{ $menu->name }}
        </a>
        <ul class="dropdown-menu" style="list-style-type: none;">
            @foreach ($list_menu_sub as $row_menu_sub)
                <li style="list-style-type: none;"><a class="dropdown-item" href="{{ $row_menu_sub->link }}"
                        style="font-size: 16px; padding: 10px; color: rgb(64, 162, 63);">{{ $row_menu_sub->name }}</a>
                </li>
            @endforeach
        </ul>
    </li>

@endif
