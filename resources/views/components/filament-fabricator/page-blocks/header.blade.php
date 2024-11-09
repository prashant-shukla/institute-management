@aware(['page'])

<div class="px-4 py-4 md:py-8 container">
    <div class="max-w-7xl mx-auto">
        <h1>{{ $titel }}</h1>
        {!! $content !!}
        
        <!-- If attachment exists, display the image -->
        @if($attachment)
            <img src="{{ asset($attachment) }}" alt="Attachment Image">
        @endif
    </div>
</div>
