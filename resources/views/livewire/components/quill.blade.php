<div>
    <div id="toolbar-container" wire:ignore>
      <span class="ql-formats">
        <select class="ql-size"></select>
      </span>
      <span class="ql-formats">
        <button class="ql-bold"></button>
        <button class="ql-italic"></button>
        <button class="ql-underline"></button>
        <button class="ql-strike"></button>
      </span>
      <span class="ql-formats">
        <button class="ql-direction" value="rtl"></button>
        <select class="ql-align"></select>
      </span>
      <span class="ql-formats">
        <button class="ql-indent" value="+1"></button>
        <button class="ql-indent" value="-1"></button>
      </span>
    </div>
    <div id="{{ $quillId }}" wire:ignore></div>
</div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  <!-- Initialize Quill editor -->
  <script>
    const quill = new Quill('#{{ $quillId }}', {
      modules: {
        syntax: true,
        toolbar: '#toolbar-container',
      },
      // placeholder: 'Compose an epic...',
      theme: 'snow',
    });
  
    // quill.root.innerHTML = '{{!! $value !!}}'.substr(1, '{{!! $value !!}}'.length-2);
    quill.root.innerHTML = '{!! $value !!}';
  
    quill.on('text-change', () => {@this.set('value', quill.getSemanticHTML())});
  </script>