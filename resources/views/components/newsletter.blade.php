<!-- newsletter-section-start -->

<div class="newsletter container-fluid bg-red text-white p-4">
    <div class="row px-lg-5 px-md-0 px-sm-1 justify-content-center">
      <div class="col-md-2 col-sm-3 centered py-2 py-md-0">
        <div class="d-flex">
          <i class="fa fa-search search-fix" aria-hidden="true"></i>
        <a href="{{route('universities')}}" class="pl-14 newsletter-box  ">
            Find a course
          </a>
        </div>
      </div>
      <div class="col-md-2 col-sm-3 centered py-2 py-md-0">
        <div class="d-flex">
          <i class="fa fa-mouse-pointer point-fix" aria-hidden="true"></i>
          <button style="cursor: pointer;background: none;border: none;padding: 0px 11px;" type="button" data-toggle="modal" data-target="#login" class="pl-14 newsletter-box role_student">
            Apply Online
          </button>
        </div>
      </div>
      <div class="col-md-2 col-sm-3 centered py-2 py-md-0">
        <div class="d-flex">
          <i class="fa fa-phone phone-fix" aria-hidden="true"></i>
        <a href="{{route('contact')}}" class="pl-14 newsletter-box">
            Contact Us
          </a>
        </div>
      </div>
      <div class="col-md-3 col-sm-3 py-2 py-md-0 p-0">
        <div class="col-auto p-0">
          <p class="mb-0 text-center text-md-left">Get the newsletter</p>
          <label class="sr-only" for="inlineFormInputGroup">Enter your E-mail</label>
          <div class="input-group mb-md-2 py-1 py-md-0">
            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter your E-mail">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-secondary">Subscribe</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- newsletter-section-end -->