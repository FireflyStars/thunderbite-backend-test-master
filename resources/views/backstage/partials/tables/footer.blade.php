<div class="flex justify-between mt-4">
    <div class="text-xs text-gray-400 pl-4 pt-2">
        Showing {{ $rows->firstItem() }} - {{ $rows->lastItem() }} of {{ $rows->total() }} entries
    </div>
    <div>
        {{ $rows->links() }}
    </div>
</div>
