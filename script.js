// document.getElementById('edit').addEventListener('click',edit);

function edit(){
  //編集ボタンを押すと入力画面が変わる。
  var rename = document.getElementById('name');
  var recontents = document.getElementById('comment');

  rename.value = "edit-name";
  recontents.value = "edit-contents";

  rename.style.backgroundColor = 'pink';
  recontents.style.backgroundColor = 'pink';


}
