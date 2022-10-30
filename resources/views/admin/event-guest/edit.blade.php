<div class="modal" id="modal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-normal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            <form class="row g-3 align-items-center"
                  action="{{ route('event-guests.update', $item ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Guest Update</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm pb-3">

                        <div class="col-12">
                            <label class="" for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{$item->name}}"
                                   placeholder="name">

                            <input type="hidden" class="form-control" name="picture" value="{{$item->picture}}">
                        </div>
                        <div class="col-12">
                            <label class="" for="phone_number">Phone</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                   value="{{$item->phone_number}}"
                                   placeholder="Phone">
                        </div>
                        <div class="col-12">
                            <label class="" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{$item->email}}"
                                   placeholder="Email">
                        </div>

                        <div class="col-12">
                            <label class="" for="gender">Gender</label>
                            <select class="form-select" name="gender" id="gender">
                                <option @if($item->gender=="লিঙ্গ") selected @endif>লিঙ্গ*</option>
                                <option @if($item->gender=="পুরুষ") selected @endif>পুরুষ</option>
                                <option @if($item->gender=="মহিলা") selected @endif>মহিলা </option>
                                <option @if($item->gender=="অন্যান্য") selected @endif>অন্যান্য </option>
                            </select>
                        </div>



                        <div class="col-12">
                            <label class="" for="address">Address</label>
                            <textarea type="text" class="form-control" id="address"
                                      name="address">{{$item->address}}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="" for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="col-12">
                            <label class="" for="category_id">Type</label>
                            <select class="form-select" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if($item->guest_category_id==$category->id) selected @endif >{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="" for="event_id">Event</label>
                            <select class="form-select" name="event_id" id="event_id">
                                @foreach($events as $event)
                                    <option value="{{$event->id}}"
                                            @if($item->event_id==$event->id) selected @endif>{{$event->title}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-12">
                            <label class="" for="qr_code">Qr Code</label>
                            <input type="text" class="form-control" id="image" name="qr_code" value="{{$item->qr_code}}">
                        </div>

                        <div class="col-12">
                            <label class="" for="status">Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="0" @if($item->status==0) selected @endif>Pending</option>
                                <option value="1" @if($item->status==1) selected @endif>Accepted</option>
                                <option value="2" @if($item->status==2) selected @endif>Cancelled</option>
                            </select>
                        </div>


                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-primary" data-bs-dismiss="modal">
                            Save
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
