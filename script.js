// document.getElementById('edit').addEventListener('click',edit);



// function edit(){
//   //編集ボタンを押すと入力画面が変わる。
//   var rename = document.getElementById('name');
//   var recontents = document.getElementById('comment');

//   rename.value = "edit-name";
//   recontents.value = "edit-contents";

//   rename.style.backgroundColor = 'pink';
//   recontents.style.backgroundColor = 'pink';


// }


function getId(get){


  // フォームのIDを取得する。
var rename = document.getElementById('rewriteName');



  // 引数で受け取ったidを変数へ
  var targetid = get.id;

      //ここまではできている
      // console.log(targetid);

  // idからオブジェクトを取得
  var target = document.getElementById(targetid);
  
      // //オブジェクト入っているので成功
      // console.log(target);

  //オブジェクトからテキストコンテントを取得

  var text = target.textContent;

  //フォームの初期値に取ってきたテキストコンテントを挿入

  rename.value = text;

  //フォームの背景色を変更する
  rename.style.backgroundColor = 'pink';

}