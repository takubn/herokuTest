
//ｰｰｰｰｰｰｰｰｰｰｰｰ一番下までスクロールするメソッドｰｰｰｰｰｰｰｰｰｰｰｰ
function moveBottom() {
  var a = document.documentElement;
  var y = a.scrollHeight - a.clientHeight;
  window.scroll(0, y);
}


//入力フォームの色と値を変更するメソッド（編集）
function changeFormEdit(name, content) {

  var name = name;
  var content = content;

  var nameText = name.textContent;
  var contentText = content.textContent;

  // フォームのIDを取得する。(name部分)
  var rename = document.getElementById('name');

  //フォームの初期値に取ってきた文字情報(name部分)を挿入
  rename.value = nameText;

  //入力を無効にする。
  rename.disabled = "true";


  // フォームのIDを取得する。(contents部分)
  var recontent = document.getElementById('comment');

  recontent.value = contentText;

  recontent.style.backgroundColor = 'pink';
}



//ｰｰｰｰｰｰｰｰｰｰｰｰ入力フォームの色を変更するメソッド（削除）ｰｰｰｰｰｰｰｰｰｰｰｰ    
function changeFormDelete(name, content) {

  var name = name;
  var content = content;

  var nameText = name.textContent;
  var contentText = content.textContent;


  // フォームのIDを取得する。(名前部分)
  var rename = document.getElementById('name');

  //フォームの初期値に取ってきた文字情報(name部分)を挿入
  rename.value = nameText;

  rename.style.backgroundColor = 'red';

  //入力を無効にする。
  rename.disabled = "true";

  // フォームのIDを取得する。(contents部分)
  var recontent = document.getElementById('comment');

  recontent.value = contentText;

  recontent.style.backgroundColor = 'red';

  //入力を無効にする。
  recontent.disabled = "true";

}


// ｰｰｰｰｰｰｰｰｰｰｰｰ編集メソッド(ボタン変更とpost送信)ｰｰｰｰｰｰｰｰｰｰｰｰ
function changeEditMode(name, contents, id) {
  var name = name.id;
  var contents = contents.id;
  var id = id.textContent;

  console.log(id);

  if (contents !== '') {

    $(function () {

      //ボタンが押されたら、「SEND」ボタンを「CHANGE」ボタンに変更する。
      $('#button-submit').replaceWith('<div class="button-change" id="change" >CHANGE</div>')

    });
  }

  $(function () {

    //「CHANGE」ボタンがクリックされたら発火。
    $('#change').click(function () {

      $.post("../php/update.php", {
        // [key]と[value]でidとコメントを送信
        id: id,
        contents: $('#comment').val()
        //postに成功したら再読み込み
      }, function () {
        location.reload();
      });

    });

  });
}


// ｰｰｰｰｰｰｰｰｰｰｰｰ削除メソッド(ボタン変更とpost送信)ｰｰｰｰｰｰｰｰｰｰｰｰ
function changeDeleteMode(id) {
  var id = id.textContent;
 
  if (id !== '') {
    $(function () {

      //ボタンが押されたら、「SEND」ボタンを「DELETE」ボタンに変更する。
      $('#button-submit').replaceWith('<div class="button-delete" id="delete" >DELETE</div>')

    });
  }

  $(function () {

    //「DELETE」ボタンがクリックされたら、発火。
    $('#delete').click(function () {

      $.post('../php/delete.php', {
        // [key]と[value]でidを送信
        id: id
        //成功したら、リロードする
      }, function () {
        location.reload(true);
      });

    });

  });
}
