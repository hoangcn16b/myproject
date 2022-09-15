<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <button wire:click="changeStatus" type="button"
        class="btn btn-@if ($rowStatus == 'active') btn-success
    @else btn-warning @endif btn-fw">

        @if ($rowStatus == 'active')
            Kích hoạt
        @else
            Không kích hoạt
        @endif
    </button>
</div>
