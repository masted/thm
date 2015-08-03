<div class="colBodyContent">
  <?= $d['html'] ?>
</div>

<script>
  if (Ngn.authorized) {
    new Ngn.DdoItemEdit(
      <?= $d['item']['id'] ?>,
      new Element('div', {'class': 'itemPageEdit'}).inject(document.getElement('.col2 .bColBody'), 'top'),
      {
        onEditComplete: function(id) {
          window.location.reload();
        }
      }
    );
  }
</script>