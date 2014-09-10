<!-- Google AJAX API ローダーのライブラリをインクルードする -->
<script type="text/javascript" src="http://www.google.com/jsapi?key=xx"></script>

<script type="text/javascript">

  function OnLoad()
  {
      var imageSearch = new google.search.ImageSearch();
      imageSearch.setResultSetSize( 1 );

      // 検索完了時に呼び出されるコールバック関数を登録する
      imageSearch.setSearchCompleteCallback( this, SearchComplete, [ imageSearch ] );

      // 検索を実行する
      imageSearch.execute( 'sky' );
  }

  function SearchComplete( searcher )
  {
      // 結果オブジェクトを取得する
      var results = searcher.results;

      if( results && ( 0 < results.length ) )
      {
          var content = document.getElementById( 'content' );

          // 情報を取得する
          for( var i = 0; i < results.length; i++ )
          {
              // 画像のファイル名
              var title = document.createElement( 'p' );
              title.appendChild( document.createTextNode( results[ i ].title ) );

              // サムネイル画像のURL
              var image = document.createElement( 'img' );
              image.src = results[ i ].tbUrl;

              content.appendChild( title );
              content.appendChild( image );
          }
      }
  }


  google.load( 'search', '1' );
  google.setOnLoadCallback( OnLoad );

</script>

<div id="content"></div>