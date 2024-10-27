@foreach ($list_menu as $row_menu)
    <x-main-menu-item :rowmenu="$row_menu" />
@endforeach
