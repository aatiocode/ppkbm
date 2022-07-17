<ul class="list-group mb-4 checkbox-menu">
  <li class="list-group-item">
    <div class="custom-control custom-checkbox">
      <input {{$userGroup['view_only'] ? "disabled" : ""}} type="checkbox" onclick="selectAll()" class="custom-control-input checkbox-select-all" id="select_all">
      <label class="custom-control-label" for="select_all"><b>Select All</b></label>
    </div>
  </li>
  @foreach($menuTree as $menu_data)
    <li class="list-group-item">
      @if ($menu_data->id == '38' and $userGroup['id'] == '1')
        <div class="custom-control custom-checkbox">
          <input disabled {{in_array($menu_data->id, $userGroup['menu_data']) ? 'checked' : ''}} value="{{$menu_data->id}}" type="checkbox" class="custom-control-input checkbox-child" id="{{$menu_data->id}}" name="menu_id[]">
          <input type="hidden" value="{{$menu_data->id}}" type="checkbox" class="custom-control-input checkbox-child" id="{{$menu_data->id}}" name="menu_id[]">
          <label class="custom-control-label" for="{{$menu_data->id}}"><b>{{$menu_data->menu_title}}</b></label>
        </div>
      @else
        <div class="custom-control custom-checkbox">
          <input {{$userGroup['view_only'] ? "disabled" : ""}} {{in_array($menu_data->id, $userGroup['menu_data']) ? 'checked' : ''}} value="{{$menu_data->id}}" type="checkbox" class="custom-control-input checkbox-child" id="{{$menu_data->id}}" name="menu_id[]">
          <label class="custom-control-label" for="{{$menu_data->id}}"><b>{{$menu_data->menu_title}}</b></label>
        </div>
      @endif
      @if ($menu_data->child)
        <ul class="list-group">
          @foreach($menu_data->child as $menu_data_child)
            @if($menu_data_child->id == '41' and $userGroup['id'] == '1')
              <li class="list-group-item border-0">
                <div class="custom-control custom-checkbox">
                  <input disabled {{in_array($menu_data_child->id, $userGroup['menu_data']) ? 'checked' : ''}} data-parent="{{$menu_data_child->parent}}" value="{{$menu_data_child->id}}" type="checkbox" class="custom-control-input checkbox-child" id="{{$menu_data_child->id}}" name="menu_id[]">
                  <input type="hidden" data-parent="{{$menu_data_child->parent}}" value="{{$menu_data_child->id}}" type="checkbox" class="custom-control-input checkbox-child" id="{{$menu_data_child->id}}" name="menu_id[]">
                  <label class="custom-control-label" for="{{$menu_data_child->id}}">{{$menu_data_child->menu_title}}</label>
                </div>
              </li>
            @else
              <li class="list-group-item border-0">
                <div class="custom-control custom-checkbox">
                  <input {{$userGroup['view_only'] ? "disabled" : ""}} {{in_array($menu_data_child->id, $userGroup['menu_data']) ? 'checked' : ''}} data-parent="{{$menu_data_child->parent}}" value="{{$menu_data_child->id}}" type="checkbox" class="custom-control-input checkbox-child" id="{{$menu_data_child->id}}" name="menu_id[]">
                  <label class="custom-control-label" for="{{$menu_data_child->id}}">{{$menu_data_child->menu_title}}</label>
                </div>
              </li>
            @endif
            @if ($menu_data_child->child)
              <ul class="list-group ml-3">
                @foreach($menu_data_child->child as $menu_data_child_child)
                  <li class="list-group-item border-0">
                    <div class="custom-control custom-checkbox">
                      <input {{$userGroup['view_only'] ? "disabled" : ""}} {{in_array($menu_data_child_child->id, $userGroup['menu_data']) ? 'checked' : ''}} data-parent="{{$menu_data_child_child->parent}}" value="{{$menu_data_child_child->id}}" type="checkbox" class="custom-control-input checkbox-child" id="{{$menu_data_child_child->id}}" name="menu_id[]">
                      <label class="custom-control-label" for="{{$menu_data_child_child->id}}">{{$menu_data_child_child->menu_title}}</label>
                    </div>
                  </li>
                @endforeach
              </ul>
            @endif
          @endforeach
        </ul>
      @endif
    </li>
  @endforeach
</ul>