@include('front.theme.header')

<section class="favourite">
    <div class="container">
        <h2 class="sec-head">Terms & Condition</h2>
        <div class="row">
            {!!$gettermscondition->termscondition_content!!}
        </div>
    </div>
</section>

@include('front.theme.footer')