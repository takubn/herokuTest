
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

  rename.style.backgroundColor = 'white';

  // フォームのIDを取得する。(contents部分)
  var recontent = document.getElementById('comment');

  recontent.value = contentText;

  recontent.style.backgroundColor = 'pink';


}

//content部分を入力可能に
$(function () {
  $('.buttonEdit').click(function () {
    $('#comment').prop('disabled', false);
  });
});



//ｰｰｰｰｰｰｰｰｰｰｰｰ入力フォームの色を変更するメソッド（削除）ｰｰｰｰｰｰｰｰｰｰｰｰ
function changeFormDelete(name, content) {

  var formElement = document.getElementById('form1');

  console.log(formElement);
  formElement.reset();



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


// ｰｰｰｰｰｰｰｰｰｰｰｰ編集部分ｰｰｰｰｰｰｰｰｰｰｰｰ

//「edit」ボタンが押されたら、「SEND」ボタンを「CHANGE」ボタンに変更する。
$(function () {
  // $('.buttonDelete').off('click');
  $('.buttonEdit').on('click', function () {

    $('#button-submit').replaceWith("<div class='button-change' id='button-submit' >CHANGE</div>");
  });
});


//post送信
function postEdit(contents, id) {
  var contents = contents.id;
  var id = id.textContent;

  $(function () {

    //「CHANGE」ボタンがクリックされたら発火。
    $('.button-change').off('click');
    $('.button-change').on('click', function () {
      // console.log(id);
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

// ｰｰｰｰｰｰｰｰｰｰｰｰ削除部分ｰｰｰｰｰｰｰｰｰｰｰ

// 「delete」ボタンが押されたら、「SEND」ボタンを「DELETE」ボタンに変更する。
$(function () {
  // $('.buttonEdit').off('click');
  $('.buttonDelete').on('click', function () {
    $('#button-submit').replaceWith("<div class='button-delete' id='button-submit' >DELETE</div>");
  });
});

//post送信
function postDelete(id) {
  var id = id.textContent;

  //「delete」ボタンを押したらpost送信
  $(function () {
    //「DELETE」ボタンがクリックされたら、発火。
    $('.button-delete').off('click');
    $('.button-delete').on('click', function () {
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


// ｰｰｰｰｰｰｰｰｰｰｰｰpagerの色・スタイルを変更するメソッドｰｰｰｰｰｰｰｰｰｰｰｰ

function changeColorByParam() {

  //パラメータを取得（？以降を取得）
  var param = location.search.substring(1);

  //パラメータから数値だけを切り取る。
  var paramNumber = param.match(/\d+$/)[0];

  var paramid = "pager" + paramNumber;

  $(function () {
    //idで指定された要素にcssを追加（入れ替える）。
    $('#' + paramid).toggleClass("paramcolor");

  });

}


// ｰｰｰｰｰｰｰｰｰｰｰｰ日時を出現・消すメソッドｰｰｰｰｰｰｰｰｰｰｰｰ

function showorhide() {
  $(function () {
    var result = $.isEmptyObject('#modified');
    if (result) {
      $('#modified').hide();
    } else {
      $('#create').hide();
    }
  });
}
