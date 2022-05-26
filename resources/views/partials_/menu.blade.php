<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('birga_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/zakaznagruzs*") ? "menu-open" : "" }} {{ request()->is("admin/autobirgas*") ? "menu-open" : "" }} {{ request()->is("admin/favouritels*") ? "menu-open" : "" }} {{ request()->is("admin/favouriteas*") ? "menu-open" : "" }} {{ request()->is("admin/drafts*") ? "menu-open" : "" }} {{ request()->is("admin/drafta*") ? "menu-open" : "" }} {{ request()->is("admin/archives*") ? "menu-open" : "" }} {{ request()->is("admin/archiveas*") ? "menu-open" : "" }} {{ request()->is("admin/mies*") ? "menu-open" : "" }} {{ request()->is("admin/myas*") ? "menu-open" : "" }} {{ request()->is("admin/offergs*") ? "menu-open" : "" }} {{ request()->is("admin/offeras*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-coins">

                            </i>
                            <p>
                                {{ trans('cruds.birga.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('zakaznagruz_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.zakaznagruzs.index") }}" class="nav-link {{ request()->is("admin/zakaznagruzs") || request()->is("admin/zakaznagruzs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-boxes">

                                        </i>
                                        <p>
                                            {{ trans('cruds.zakaznagruz.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('autobirga_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.autobirgas.index") }}" class="nav-link {{ request()->is("admin/autobirgas") || request()->is("admin/autobirgas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-truck-moving">

                                        </i>
                                        <p>
                                            {{ trans('cruds.autobirga.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('favouritel_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.favouritels.index") }}" class="nav-link {{ request()->is("admin/favouritels") || request()->is("admin/favouritels/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.favouritel.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('favouritea_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.favouriteas.index") }}" class="nav-link {{ request()->is("admin/favouriteas") || request()->is("admin/favouriteas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.favouritea.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('draft_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.drafts.index") }}" class="nav-link {{ request()->is("admin/drafts") || request()->is("admin/drafts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.draft.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('draftum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.drafta.index") }}" class="nav-link {{ request()->is("admin/drafta") || request()->is("admin/drafta/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.draftum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('archive_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.archives.index") }}" class="nav-link {{ request()->is("admin/archives") || request()->is("admin/archives/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.archive.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('archivea_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.archiveas.index") }}" class="nav-link {{ request()->is("admin/archiveas") || request()->is("admin/archiveas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.archivea.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('my_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.mies.index") }}" class="nav-link {{ request()->is("admin/mies") || request()->is("admin/mies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.my.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('mya_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.myas.index") }}" class="nav-link {{ request()->is("admin/myas") || request()->is("admin/myas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.mya.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('offerg_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.offergs.index") }}" class="nav-link {{ request()->is("admin/offergs") || request()->is("admin/offergs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.offerg.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('offera_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.offeras.index") }}" class="nav-link {{ request()->is("admin/offeras") || request()->is("admin/offeras/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.offera.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('tm_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/listproducts*") ? "menu-open" : "" }} {{ request()->is("admin/doc-ttns*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-truck-moving">

                            </i>
                            <p>
                                {{ trans('cruds.tm.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('listproduct_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.listproducts.index") }}" class="nav-link {{ request()->is("admin/listproducts") || request()->is("admin/listproducts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-boxes">

                                        </i>
                                        <p>
                                            {{ trans('cruds.listproduct.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('doc_ttn_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.doc-ttns.index") }}" class="nav-link {{ request()->is("admin/doc-ttns") || request()->is("admin/doc-ttns/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.docTtn.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('nazna_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/offers*") ? "menu-open" : "" }} {{ request()->is("admin/nooffers*") ? "menu-open" : "" }} {{ request()->is("admin/naznaperes*") ? "menu-open" : "" }} {{ request()->is("admin/naznaotms*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-truck-moving">

                            </i>
                            <p>
                                {{ trans('cruds.nazna.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('offer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.offers.index") }}" class="nav-link {{ request()->is("admin/offers") || request()->is("admin/offers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.offer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('nooffer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.nooffers.index") }}" class="nav-link {{ request()->is("admin/nooffers") || request()->is("admin/nooffers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.nooffer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('naznapere_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.naznaperes.index") }}" class="nav-link {{ request()->is("admin/naznaperes") || request()->is("admin/naznaperes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.naznapere.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('naznaotm_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.naznaotms.index") }}" class="nav-link {{ request()->is("admin/naznaotms") || request()->is("admin/naznaotms/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.naznaotm.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('mycompany_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/mycompans*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/pointloads*") ? "menu-open" : "" }} {{ request()->is("admin/perevoz-exps*") ? "menu-open" : "" }} {{ request()->is("admin/perevozklients*") ? "menu-open" : "" }} {{ request()->is("admin/zakazchikklients*") ? "menu-open" : "" }} {{ request()->is("admin/zakazhik-perevozs*") ? "menu-open" : "" }} {{ request()->is("admin/zakazgrups*") ? "menu-open" : "" }} {{ request()->is("admin/perevozchik-perevozs*") ? "menu-open" : "" }} {{ request()->is("admin/products*") ? "menu-open" : "" }} {{ request()->is("admin/companyinfos*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-sitemap">

                            </i>
                            <p>
                                {{ trans('cruds.mycompany.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('mycompan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.mycompans.index") }}" class="nav-link {{ request()->is("admin/mycompans") || request()->is("admin/mycompans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-building">

                                        </i>
                                        <p>
                                            {{ trans('cruds.mycompan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pointload_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pointloads.index") }}" class="nav-link {{ request()->is("admin/pointloads") || request()->is("admin/pointloads/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marker-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pointload.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('perevoz_exp_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.perevoz-exps.index") }}" class="nav-link {{ request()->is("admin/perevoz-exps") || request()->is("admin/perevoz-exps/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.perevozExp.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('perevozklient_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.perevozklients.index") }}" class="nav-link {{ request()->is("admin/perevozklients") || request()->is("admin/perevozklients/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.perevozklient.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('zakazchikklient_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.zakazchikklients.index") }}" class="nav-link {{ request()->is("admin/zakazchikklients") || request()->is("admin/zakazchikklients/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.zakazchikklient.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('zakazhik_perevoz_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.zakazhik-perevozs.index") }}" class="nav-link {{ request()->is("admin/zakazhik-perevozs") || request()->is("admin/zakazhik-perevozs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.zakazhikPerevoz.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('zakazgrup_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.zakazgrups.index") }}" class="nav-link {{ request()->is("admin/zakazgrups") || request()->is("admin/zakazgrups/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.zakazgrup.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('perevozchik_perevoz_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.perevozchik-perevozs.index") }}" class="nav-link {{ request()->is("admin/perevozchik-perevozs") || request()->is("admin/perevozchik-perevozs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.perevozchikPerevoz.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-archive">

                                        </i>
                                        <p>
                                            {{ trans('cruds.product.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('companyinfo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.companyinfos.index") }}" class="nav-link {{ request()->is("admin/companyinfos") || request()->is("admin/companyinfos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.companyinfo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('partner_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/partnerzs*") ? "menu-open" : "" }} {{ request()->is("admin/partnerps*") ? "menu-open" : "" }} {{ request()->is("admin/partnerms*") ? "menu-open" : "" }} {{ request()->is("admin/partneris*") ? "menu-open" : "" }} {{ request()->is("admin/partnerbs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.partner.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('partnerz_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partnerzs.index") }}" class="nav-link {{ request()->is("admin/partnerzs") || request()->is("admin/partnerzs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partnerz.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('partnerp_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partnerps.index") }}" class="nav-link {{ request()->is("admin/partnerps") || request()->is("admin/partnerps/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partnerp.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('partnerm_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partnerms.index") }}" class="nav-link {{ request()->is("admin/partnerms") || request()->is("admin/partnerms/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partnerm.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('partneri_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partneris.index") }}" class="nav-link {{ request()->is("admin/partneris") || request()->is("admin/partneris/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partneri.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('partnerb_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partnerbs.index") }}" class="nav-link {{ request()->is("admin/partnerbs") || request()->is("admin/partnerbs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partnerb.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('autoparkmenu_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/drivers*") ? "menu-open" : "" }} {{ request()->is("admin/autos*") ? "menu-open" : "" }} {{ request()->is("admin/upravlenies*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-truck-moving">

                            </i>
                            <p>
                                {{ trans('cruds.autoparkmenu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('driver_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.drivers.index") }}" class="nav-link {{ request()->is("admin/drivers") || request()->is("admin/drivers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.driver.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('auto_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.autos.index") }}" class="nav-link {{ request()->is("admin/autos") || request()->is("admin/autos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-truck-moving">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auto.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('upravlenie_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.upravlenies.index") }}" class="nav-link {{ request()->is("admin/upravlenies") || request()->is("admin/upravlenies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tasks">

                                        </i>
                                        <p>
                                            {{ trans('cruds.upravlenie.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('monitorng_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.monitorngs.index") }}" class="nav-link {{ request()->is("admin/monitorngs") || request()->is("admin/monitorngs/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-globe-africa">

                            </i>
                            <p>
                                {{ trans('cruds.monitorng.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }} {{ request()->is("admin/teams*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('team_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.team.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.userAlert.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('wiki_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/customs*") ? "menu-open" : "" }} {{ request()->is("admin/typekuzovas*") ? "menu-open" : "" }} {{ request()->is("admin/markas*") ? "menu-open" : "" }} {{ request()->is("admin/rolecomps*") ? "menu-open" : "" }} {{ request()->is("admin/typeloaddests*") ? "menu-open" : "" }} {{ request()->is("admin/adrs*") ? "menu-open" : "" }} {{ request()->is("admin/typeloads*") ? "menu-open" : "" }} {{ request()->is("admin/ltlftls*") ? "menu-open" : "" }} {{ request()->is("admin/catware*") ? "menu-open" : "" }} {{ request()->is("admin/typeloadunloads*") ? "menu-open" : "" }} {{ request()->is("admin/sourcegoods*") ? "menu-open" : "" }} {{ request()->is("admin/logistgroups*") ? "menu-open" : "" }} {{ request()->is("admin/filials*") ? "menu-open" : "" }} {{ request()->is("admin/typeperevozs*") ? "menu-open" : "" }} {{ request()->is("admin/countries*") ? "menu-open" : "" }} {{ request()->is("admin/cities*") ? "menu-open" : "" }} {{ request()->is("admin/typeloaddestinations*") ? "menu-open" : "" }} {{ request()->is("admin/typestatuses*") ? "menu-open" : "" }} {{ request()->is("admin/statuszayas*") ? "menu-open" : "" }} {{ request()->is("admin/lastevents*") ? "menu-open" : "" }} {{ request()->is("admin/titilegruzs*") ? "menu-open" : "" }} {{ request()->is("admin/valuta*") ? "menu-open" : "" }} {{ request()->is("admin/typeolpata*") ? "menu-open" : "" }} {{ request()->is("admin/typedolgnostis*") ? "menu-open" : "" }} {{ request()->is("admin/filialmains*") ? "menu-open" : "" }} {{ request()->is("admin/dopeqs*") ? "menu-open" : "" }} {{ request()->is("admin/others*") ? "menu-open" : "" }} {{ request()->is("admin/condtorgs*") ? "menu-open" : "" }} {{ request()->is("admin/gruzs*") ? "menu-open" : "" }} {{ request()->is("admin/typepacks*") ? "menu-open" : "" }} {{ request()->is("admin/trandocs*") ? "menu-open" : "" }} {{ request()->is("admin/condpays*") ? "menu-open" : "" }} {{ request()->is("admin/unitmas*") ? "menu-open" : "" }} {{ request()->is("admin/holidays*") ? "menu-open" : "" }} {{ request()->is("admin/autotyploads*") ? "menu-open" : "" }} {{ request()->is("admin/typecompanies*") ? "menu-open" : "" }} {{ request()->is("admin/typeunloads*") ? "menu-open" : "" }} {{ request()->is("admin/trebovans*") ? "menu-open" : "" }} {{ request()->is("admin/valutands*") ? "menu-open" : "" }} {{ request()->is("admin/type-palets*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-book-open">

                            </i>
                            <p>
                                {{ trans('cruds.wiki.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('custom_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.customs.index") }}" class="nav-link {{ request()->is("admin/customs") || request()->is("admin/customs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-code-branch">

                                        </i>
                                        <p>
                                            {{ trans('cruds.custom.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typekuzova_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typekuzovas.index") }}" class="nav-link {{ request()->is("admin/typekuzovas") || request()->is("admin/typekuzovas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-truck-moving">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typekuzova.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('marka_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.markas.index") }}" class="nav-link {{ request()->is("admin/markas") || request()->is("admin/markas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-500px">

                                        </i>
                                        <p>
                                            {{ trans('cruds.marka.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('rolecomp_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.rolecomps.index") }}" class="nav-link {{ request()->is("admin/rolecomps") || request()->is("admin/rolecomps/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-500px">

                                        </i>
                                        <p>
                                            {{ trans('cruds.rolecomp.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typeloaddest_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typeloaddests.index") }}" class="nav-link {{ request()->is("admin/typeloaddests") || request()->is("admin/typeloaddests/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typeloaddest.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('adr_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.adrs.index") }}" class="nav-link {{ request()->is("admin/adrs") || request()->is("admin/adrs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-exclamation-triangle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.adr.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typeload_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typeloads.index") }}" class="nav-link {{ request()->is("admin/typeloads") || request()->is("admin/typeloads/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-truck-loading">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typeload.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ltlftl_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ltlftls.index") }}" class="nav-link {{ request()->is("admin/ltlftls") || request()->is("admin/ltlftls/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-500px">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ltlftl.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('catware_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.catware.index") }}" class="nav-link {{ request()->is("admin/catware") || request()->is("admin/catware/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.catware.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typeloadunload_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typeloadunloads.index") }}" class="nav-link {{ request()->is("admin/typeloadunloads") || request()->is("admin/typeloadunloads/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typeloadunload.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('sourcegood_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sourcegoods.index") }}" class="nav-link {{ request()->is("admin/sourcegoods") || request()->is("admin/sourcegoods/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.sourcegood.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('logistgroup_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.logistgroups.index") }}" class="nav-link {{ request()->is("admin/logistgroups") || request()->is("admin/logistgroups/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.logistgroup.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('filial_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.filials.index") }}" class="nav-link {{ request()->is("admin/filials") || request()->is("admin/filials/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.filial.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typeperevoz_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typeperevozs.index") }}" class="nav-link {{ request()->is("admin/typeperevozs") || request()->is("admin/typeperevozs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-globe-africa">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typeperevoz.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('country_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.countries.index") }}" class="nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-flag">

                                        </i>
                                        <p>
                                            {{ trans('cruds.country.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('city_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cities.index") }}" class="nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.city.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typeloaddestination_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typeloaddestinations.index") }}" class="nav-link {{ request()->is("admin/typeloaddestinations") || request()->is("admin/typeloaddestinations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typeloaddestination.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typestatus_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typestatuses.index") }}" class="nav-link {{ request()->is("admin/typestatuses") || request()->is("admin/typestatuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typestatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('statuszaya_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.statuszayas.index") }}" class="nav-link {{ request()->is("admin/statuszayas") || request()->is("admin/statuszayas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.statuszaya.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('lastevent_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.lastevents.index") }}" class="nav-link {{ request()->is("admin/lastevents") || request()->is("admin/lastevents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.lastevent.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('titilegruz_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.titilegruzs.index") }}" class="nav-link {{ request()->is("admin/titilegruzs") || request()->is("admin/titilegruzs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-box-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.titilegruz.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('valutum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.valuta.index") }}" class="nav-link {{ request()->is("admin/valuta") || request()->is("admin/valuta/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-money-bill-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.valutum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typeolpatum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typeolpata.index") }}" class="nav-link {{ request()->is("admin/typeolpata") || request()->is("admin/typeolpata/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-credit-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typeolpatum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typedolgnosti_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typedolgnostis.index") }}" class="nav-link {{ request()->is("admin/typedolgnostis") || request()->is("admin/typedolgnostis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-female">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typedolgnosti.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('filialmain_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.filialmains.index") }}" class="nav-link {{ request()->is("admin/filialmains") || request()->is("admin/filialmains/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-code-branch">

                                        </i>
                                        <p>
                                            {{ trans('cruds.filialmain.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('dopeq_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dopeqs.index") }}" class="nav-link {{ request()->is("admin/dopeqs") || request()->is("admin/dopeqs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dopeq.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('other_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.others.index") }}" class="nav-link {{ request()->is("admin/others") || request()->is("admin/others/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.other.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('condtorg_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.condtorgs.index") }}" class="nav-link {{ request()->is("admin/condtorgs") || request()->is("admin/condtorgs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.condtorg.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('gruz_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.gruzs.index") }}" class="nav-link {{ request()->is("admin/gruzs") || request()->is("admin/gruzs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-boxes">

                                        </i>
                                        <p>
                                            {{ trans('cruds.gruz.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typepack_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typepacks.index") }}" class="nav-link {{ request()->is("admin/typepacks") || request()->is("admin/typepacks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typepack.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('trandoc_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.trandocs.index") }}" class="nav-link {{ request()->is("admin/trandocs") || request()->is("admin/trandocs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.trandoc.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('condpay_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.condpays.index") }}" class="nav-link {{ request()->is("admin/condpays") || request()->is("admin/condpays/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.condpay.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('unitma_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.unitmas.index") }}" class="nav-link {{ request()->is("admin/unitmas") || request()->is("admin/unitmas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.unitma.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('holiday_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.holidays.index") }}" class="nav-link {{ request()->is("admin/holidays") || request()->is("admin/holidays/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.holiday.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('autotypload_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.autotyploads.index") }}" class="nav-link {{ request()->is("admin/autotyploads") || request()->is("admin/autotyploads/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-clock">

                                        </i>
                                        <p>
                                            {{ trans('cruds.autotypload.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typecompany_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typecompanies.index") }}" class="nav-link {{ request()->is("admin/typecompanies") || request()->is("admin/typecompanies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typecompany.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('typeunload_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.typeunloads.index") }}" class="nav-link {{ request()->is("admin/typeunloads") || request()->is("admin/typeunloads/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-truck-loading">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typeunload.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('trebovan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.trebovans.index") }}" class="nav-link {{ request()->is("admin/trebovans") || request()->is("admin/trebovans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.trebovan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('valutand_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.valutands.index") }}" class="nav-link {{ request()->is("admin/valutands") || request()->is("admin/valutands/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-money-bill-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.valutand.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('type_palet_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.type-palets.index") }}" class="nav-link {{ request()->is("admin/type-palets") || request()->is("admin/type-palets/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-pallet">

                                        </i>
                                        <p>
                                            {{ trans('cruds.typePalet.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @php($unread = \App\Models\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif

                        </a>
                    </li>
                    @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "active" : "" }} nav-link" href="{{ route("admin.team-members.index") }}">
                                <i class="fa-fw fa fa-users nav-icon">
                                </i>
                                <p>
                                    {{ trans("global.team-members") }}
                                </p>
                            </a>
                        </li>
                    @endif
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>