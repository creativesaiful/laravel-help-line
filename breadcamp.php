<!-- Breadcamp (Page header) -->
<div class="container content-header " style="background-color: #dde6ed">
    <div class="row d-flex align-items-center ">
        <div class="col-md-3 font-weight-bold" style="border-right: 5px solid red;">
            <h2 class="page-title text-danger pt-2 text-center">
                {{ strtoupper(collect(request()->segments())->last()) }}</h2>
        </div>
        <div class="col-md-9">
            <div class="d-inline-block align-items-center">
                <a href="/dashboard"><i class="fa fa-dashboard"></i></a> >
                <?php $link = ''; ?>
                @for ($i = 1; $i <= count(Request::segments()); $i++)
                    @if (($i < count(Request::segments())) & ($i > 0))
                        <?php $link .= '/' . Request::segment($i); ?>
                        <a href="<?= $link ?>">{{ ucwords(str_replace('-', ' ', Request::segment($i))) }}</a> >
                    @else
                        {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}
                    @endif
                @endfor
            </div>
        </div>
    </div>
</div>