<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ request()->is('home') ? 'active' : '' }}"> <a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> <span>Asosiy sahifa</span></a> </li>
                <!-- <li class="list-divider"></li> -->
                <li class="{{ request()->is('self-partners') ? 'active' : '' }}"> <a href="{{ route('self-partners') }}"><i class="far fa-user"></i> <span>Shaxsiy hamkorlar</span></a> </li>
                <li class="{{ request()->is('partners-tree') ? 'active' : '' }}"> <a href="{{ route('partners-tree') }}"><i class="fa fa-sitemap"></i> <span>Hamkorlar Daraxti</span></a> </li>
                <li class="text-secondary" title="Tez kunda..."> <a><i class="far fa-money-bill-alt"></i> <span>Xaridlar xisoboti</span></a> </li>
            </ul>
        </div>
    </div>
</div>