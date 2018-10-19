<!-- Add Modal -->
<div class="modal fade" id="@yield('currentpage')AddModal" tabindex="-1" role="dialog" aria-labelledby="@yield('currentpage')AddModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="@yield('currentpage')AddModalLabel">Add @yield('currentpage')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @yield('AddModalContent')
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="@yield('currentpage')DeleteModal" tabindex="-1" role="dialog" aria-labelledby="@yield('currentpage')DeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="@yield('currentpage')DeleteModalLabel">Delete @yield('currentpage')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @yield('DeleteModalContent')
    </div>
  </div>
</div>