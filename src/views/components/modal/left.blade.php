<div class="modal fade example-modal-right-transparent" id="{{$modalId}}" tabindex="-1" role="dialog" aria-modal="true" >
    <div class="modal-dialog modal-dialog-right modal-sm modal-transparent">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4 text-white">{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
            <div class="modal-footer" style="direction: ltr">
                <button type="button" class="btn btn-primary waves-effect waves-themed" id="{{$buttonId}}">{{$button}}</button>
                <button type="button" class="btn btn-secondary waves-effect waves-themed mr-2" data-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>
