<!-- =================== Footer Section ============ -->
<footer class="footer">
    <div class="upper-foot">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div id="subscribe">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center">
                        <i class="fa fa-envelope-o"></i>
                        ابقى على تواصل وانضم لنشرتنا الاخبارية
                    </h2>
                </div>

                <div class="row">

                    <div class="col-md-6 col-md-offset-3">

                        <form class="sub" action="{{ route('site.subscribe') }}" method="post" onsubmit="return false;">
                            <div class="form-group">{{ csrf_field() }}
                                <input type="text" class="form-control" name="email" placeholder="أدخل بريدك الإلكتروني">
                                <input type="submit" class="btn btn-primary" value="شارك"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="lower-foot">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <p class="copy-right">© Copyright 2018 Walema</p>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <ul class="list-unstyled pull-right">
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>