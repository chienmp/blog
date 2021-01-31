<footer>
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <p class="copyright">{{ env('APP_NAME') }} @ {{ date('Y') }}. All rights reserved.</p>
                    <p class="copyright"><strong>Developed &amp;<i class="ion-heart"></i> by </strong>
                        <a href="#" target="_blank"> Me</a></p>
                    <ul class="icons">
                        <li><a target="_blank" href="#"><i class="ion-social-facebook-outline"></i></a></li>
                        <li><a target="_blank" href="#"><i class="ion-social-twitter-outline"></i></a></li>
                        <li><a target="_blank" href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        <li><a target="_blank" href="#"><i class="ion-social-youtube-outline"></i></a></li>
                    </ul>
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <h4 class="title"><b>{{ trans('Categories') }}</b></h4>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('category.index', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>{{ trans('subcribe') }}</b></h4>
                    <div class="input-area">
                        <form method="POST" action="{{ route('subcriber.store') }}">
                            @csrf
                            <input class="email-input" name="email" type="email" placeholder="{{ trans('your_email') }}">
                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
