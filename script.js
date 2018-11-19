
function getId(get){

  // フォームのIDを取得する。
var rename = document.getElementById('comment');


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


function getDirect(name,content){
  //編集ボタンを押すと入力フォームにその値が挿入されるメソッド
  
          // 引数で受け取った値(id)を変数に代入
          var name = name;
          var content = content;
  
          // idから文字情報を取得し、変数に代入
          var nameText = name.textContent;
          var contentText = content.textContent;
  
  
          // フォームのIDを取得する。(名前部分)
              var rename = document.getElementById('rewriteName');
  
              //フォームの初期値に取ってきた文字情報(name部分)を挿入
  
              rename.value = nameText;
  
              // //フォームの背景色を変更する
              rename.style.backgroundColor = 'pink';
  
  
          // フォームのIDを取得する。(コンテンツ部分)
          var recontent = document.getElementById('comment');
  
          //フォームの初期値に取ってきた文字情報（content部分）を挿入
  
          recontent.value = contentText;
  
          //フォームの背景色を変更する
          recontent.style.backgroundColor = 'pink';
  }