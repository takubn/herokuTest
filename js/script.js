
//一番下までスクロール
function scr(){
        var a = document.documentElement;
        var y = a.scrollHeight - a.clientHeight;
        window.scroll(0, y);
}



//編集ボタンを押すと入力フォームに値が挿入され、色が変わるメソッド
function inputColorEdit(name,content){
  
          // 引数で受け取った値(id)を変数に代入
          var name = name;
          var content = content;
  
          // idから文字情報を取得し、変数に代入
          var nameText = name.textContent;
          var contentText = content.textContent;
  
  
          // フォームのIDを取得する。(名前部分)
              var rename = document.getElementById('name');
  
              //フォームの初期値に取ってきた文字情報(name部分)を挿入
  
              rename.value = nameText;

              //入力を無効にする。
                rename.disabled = "true";

  
          // フォームのIDを取得する。(コンテンツ部分)
          var recontent = document.getElementById('comment');
  
          //フォームの初期値に取ってきた文字情報（content部分）を挿入
  
          recontent.value = contentText;
  
          //フォームの背景色を変更する
          recontent.style.backgroundColor = 'pink';

  
    }


//削除ボタンを押すと入力フォームに値が挿入され、色が変わるメソッド    
function inputColorDelete(name,content){
  
      // 引数で受け取った値(id)を変数に代入
      var name = name;
      var content = content;
      

      // idから文字情報を取得し、変数に代入
      var nameText = name.textContent;
      var contentText = content.textContent;


      // フォームのIDを取得する。(名前部分)
          var rename = document.getElementById('name');

            // console.log(rename);

          //フォームの初期値に取ってきた文字情報(name部分)を挿入
          rename.value = nameText;

          //フォームの背景色を変更する
          rename.style.backgroundColor = 'red';

          //入力を無効にする。
            rename.disabled = "true";


      // フォームのIDを取得する。(コンテンツ部分)
      var recontent = document.getElementById('comment');

      //フォームの初期値に取ってきた文字情報（content部分）を挿入

      recontent.value = contentText;

      //フォームの背景色を変更する
      recontent.style.backgroundColor = 'red';

      //入力を無効にする。
      recontent.disabled = "true";

}


// 編集メソッド

    function getId(na,con,id){
            var na = na.id;
            var con = con.id;
            var id = id.textContent;
        console.log(id);

        if(con !==''){
            
            $(function(){
              
              //ボタンが押されたら、「SEND」ボタンを「CHANGE」ボタンに変更する。
            $('#button-blue').replaceWith('<div class="changeBy" id="change" >CHANGE</div>')
            
            });
        }


        $(function(){

                    //指定の要素がクリックされたら発火。→変数で表現する
                    $('#change').click(function(){

                          // post方式で'update.php'に送信する。
                          $.post("../php/update.php",{
                              // [key名]と[value]=自分で設定してよい　でidとコメントの変更内容を取得
                              id: id,
                              contents: $('#comment').val()
                              //postに成功したときにどうするか。→再読み込み
                          },function(){
                              location.reload();
                          });
                
                    });
                  
                });                
        }      





// 削除メソッド

  function deleteBy(id){
      console.log(id);
      var id = id.textContent;
      console.log(id);

      if(id !==''){       
          $(function(){
            
            //ボタンが押されたら、「SEND」ボタンを「delete」ボタンに変更する。
          $('#button-blue').replaceWith('<div class="deleteBy" id="delete" >DELETE</div>')
          
          });
      }

      // post方式でidを渡す
        $(function(){

          //deleteボタンが押されたら、発火
          $('#delete').click(function(){



            //postでidを送信
            $.post("../php/delete.php",{
              id:id
            //成功したら、リロードする
            },function(){
              location.reload(true);
            });

          });

        });
  }



 