<form action="{{route('universities.search')}}" method="post">
  @csrf
<div class="row">
  <div class="col-md-10 col-sm-12">
    <div class="container-fluid px-0 search-padding">
      <div class="form-row">
          <div class="form-group col-md-4 offset-md-1 p-0 pl-2p">
              <input name="text" type="text" class="form-control border-none btr-bbr-none" id="inputLearn"
                  placeholder="What do you want to learn?">
          </div>
      <div class="form-group col-md-3 border-none p-0" style="margin-right: -1px;">
            <div class="select">
              <select name="courses"  id="inputCourse" class="form-control border-none br-none">
                <option value="all" >All Courses</option>
                @foreach (Con::courses() as $item)
                  <option value="{{$item->id}}"> {{$item->name}}</option>    
                @endforeach
              </select>
            </div>
        </div>
        <div class="form-group col-md-3 border-none p-0">
            <div class="select">
              @php   $types= Con::All_Type(); @endphp
              <select name="type" id="inputTitle" class="form-control border-none br-none w-100">
                <option value="all">All Type</option>
                @foreach($types as $type)
                 <option >{{$type->name}}</option>
                @endforeach
             </select>
            </div>
        </div>
        <div class="form-group col-md-1 p-0 text-left">
             <button class="btn btn-online brl-none my-sm-0 btn-mob" type="submit"><i
             class="fa fa-search markcon-gray" aria-hidden="true"></i></button>
        </div>
      </div>
  </div>
  </div>
</div>
</form>