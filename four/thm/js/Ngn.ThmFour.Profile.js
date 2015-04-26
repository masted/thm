Ngn.ThmFour.Profile = {};


Ngn.ThmFour.Profile.openEditDialog = function() {
  new Ngn.Dialog.RequestForm({
    width: 200,
    url: '/profile/json_edit'
  });
};