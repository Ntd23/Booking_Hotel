<div>
  <div class="row">
    {{-- <div class="col-md-3">
      <label for="country">Room</label>
      <select name="room" id="room" class="form-control">
        @foreach ($rooms as $room)
          <option value="{{ $room->id }}">{{ $room->name }}</option>
        @endforeach
      </select>
    </div> --}}
    <div class="col-md-3">
      <label for="from">From</label>
      <input type="date" name="from" id="from" class="form-control">
    </div>
    <div class="col-md-3">
      <label for="to">To</label>
      <input type="date" name="to" id="to" class="form-control">
    </div>
    <div class="col-md-3">
      <input type="button" value="Filter" class="btn btn-success" onclick="getData()" style="margin-top: 31px;">
    </div>
  </div>
</div>
