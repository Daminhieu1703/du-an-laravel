@extends('client.layout.master')
@section('content-tittle','Liên hệ')
@section('content')
<section class="contact-page" data-aos="zoom-in">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-4 mt-5">
                <img id="postcard" src="{{ asset('assets/client/img/product-1.jpg') }}" alt="postcard" class="img-responsive move">
                <div id="content">
                    <h1 class="title-contact">Liên hệ chúng tôi</h1>
                    <form role="form">
                        <div class="form-group">
                            <label for="username" class="iconic user">ọ và tên<span class="required">*</span></label>
                            <input type="text" class="form-control" name="username" id="username"  required="required" placeholder="Chào bạn, mời bạn điền tên">
                        </div>
                        <div class="form-group">
                            <label for="usermail" class="iconic mail-alt">mail<span class="required">*</span></label> 
                            <input type="email" class="form-control" name="usermail" id="usermail" placeholder="Mời bạn điền email" required="required">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="iconic quote-alt">iêu đề</label>
                            <input type="text" class="form-control" name="subject" id="subject"  required="required" placeholder="Mời bạn điền tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="message" class="iconic comment">ội dung</label>
                            <textarea name="message" id="message"  class="form-control" rows="3" placeholder="Mời bạn điền nội dung"  required="required"></textarea>
                        </div>
                        <input type="submit" value="  Gửi đi  !" />    	
                    </form>
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-8 mt-5">
                <div class="frames-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29830.49137070961!2d105.82237741762611!3d20.839320160467707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135b39a12290657%3A0x238aca97bceea660!2zVMOibiBNaW5oLCBUaMaw4budbmcgVMOtbiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1658565970462!5m2!1svi!2s" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection