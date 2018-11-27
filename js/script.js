
//編集ボタンを押すと入力フォームにその値が挿入されるメソッド
function getDirect(name,content){
  
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

        //   ---------sendボタンのデザインを動的に変える------------

        // var elem = document.getElementById('button-blue');

        // //初期値をchangeの文字列に
        // elem.value = "CHANGE";
  
  
    }

  


  // function deleteBy(name){
  //     var nameId = name.id;

 
  //     if(nameId !==''){       
  //         $(function(){
            
  //           //ボタンが押されたら、「SEND」ボタンを「delete」ボタンに変更する。
  //         $('#button-blue').replaceWith('<div class="deleteBy" id="delete" >DELETE</div>')
          
  //         });
  //     }

  //     // post方式でidを渡す
  //       $(function(){

  //         //deleteボタンが押されたら、発火
  //         $('#delete').click(function(){

  //           // test
  //           alert('作動');

  //           //postでidを送信
  //           $.post('delete.php',{
  //             id:nameId
  //           //成功したら、リロードする
  //           },function(){
  //             location.reload(true);
  //           });

  //         });

  //       });
  // }