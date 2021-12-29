ClassicEditor
  .create(document.querySelector('#editor'), {
    toolbar: [
      'bold', 'italic', 'underline', 'link', '|',
      'removeFormat', '|',
      'blockQuote', 'undo', 'redo', '|',
    ],
  })
  .catch(error => {
    console.log(error);
  })
