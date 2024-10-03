function checekedTXT ()
{
  var selectedRows = $( 'input.select-row:checked' ).closest( 'tr' );

  var AVR_I_SSAPNos = [];
  table.rows( { page: 'all' } ).nodes().each( function ( row )
  {
    var $row = $( row );
    if ( $row.find( 'input.select-row:checked' ).length > 0 )
    {
      var AVR_I_SSAPNo = $row.find( 'td:eq(1)' ).text();
      AVR_I_SSAPNos.push( AVR_I_SSAPNo );
    }
  } );
  if ( AVR_I_SSAPNos.length === 0 )
  {
    alert( "Table is empty!" );
    return;
  }
  var myids;
  myids += AVR_I_SSAPNos.join( ", " );
  $.ajax( {
    url: "db_query.php",
    type: "POST",
    data: { ids: myids },
    success: function ( result )
    {
      var blob = new Blob( [ result ], { type: "text/plain;charset=utf-8" } );
      var downloadLink = document.createElement( "a" );
      downloadLink.href = URL.createObjectURL( blob );
      downloadLink.download = "AVR_I_SSAPDB_result_selected.txt";
      document.body.appendChild( downloadLink );
      downloadLink.click();
      document.body.removeChild( downloadLink );
    }
  } );
}

function checekedTXTPreview ()
{
  var selectedRows = $( 'input.select-row:checked' ).closest( 'tr' );

  var AVR_I_SSAPNos = [];
  table.rows( { page: 'all' } ).nodes().each( function ( row )
  {
    var $row = $( row );
    if ( $row.find( 'input.select-row:checked' ).length > 0 )
    {
      var AVR_I_SSAPNo = $row.find( 'td:eq(1)' ).text();
      AVR_I_SSAPNos.push( AVR_I_SSAPNo );
    }
  } );
  if ( AVR_I_SSAPNos.length === 0 )
  {
    alert( "Table is empty!" );
    return;
  }
  var myids;
  myids += AVR_I_SSAPNos.join( ", " );
  $.ajax( {
    url: "db_query.php",
    type: "POST",
    data: { ids: myids },
    success: function ( result )
    {
      var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
      if ( popup === null || typeof ( popup ) == 'undefined' )
      {
        alert( 'Popup blocked. Please allow popups for this website and try again.' );
        return;
      }
      popup.document.write( '<html><head><title>Checked Result Preview in Text Format</title></head><body><pre>' + result + '</pre></body></html>' );
    }
  } );
}

function selectAllRowsTXT ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  var searchValue = table.search();
  table.rows( { search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();

    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    $.ajax( {
      url: "db_query.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var blob = new Blob( [ result ], { type: "text/plain;charset=utf-8" } );
        var downloadLink = document.createElement( "a" );
        downloadLink.href = URL.createObjectURL( blob );
        downloadLink.download = "AVR_I_SSAPDB_result_all.txt";
        document.body.appendChild( downloadLink );
        downloadLink.click();
        document.body.removeChild( downloadLink );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function selectAllRowsTXTPreview ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  var searchValue = table.search();
  table.rows( { search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();

    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    $.ajax( {
      url: "db_query.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
        if ( popup === null || typeof ( popup ) == 'undefined' )
        {
          alert( 'Popup blocked. Please allow popups for this website and try again.' );
          return;
        }
        popup.document.write( '<html><head><title>All Page Result Preview in Text Format</title></head><body><pre>' + result + '</pre></body></html>' );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function perPageSelectedAVRISSAPDBNosTXT ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  table.rows( { page: 'current', search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();
    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    $.ajax( {
      url: "db_query.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var blob = new Blob( [ result ], { type: "text/plain;charset=utf-8" } );
        var downloadLink = document.createElement( "a" );
        downloadLink.href = URL.createObjectURL( blob );
        downloadLink.download = "AVR_I_SSAPDB_result_current_page.txt";
        document.body.appendChild( downloadLink );
        downloadLink.click();
        document.body.removeChild( downloadLink );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function perPageSelectedAVRISSAPDBNosTXTPreview ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  table.rows( { page: 'current', search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();

    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    $.ajax( {
      url: "db_query.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
        if ( popup === null || typeof ( popup ) == 'undefined' )
        {
          alert( 'Popup blocked. Please allow popups for this website and try again.' );
          return;
        }
        popup.document.write( '<html><head><title>Current Page Result Preview in Text Format</title></head><body><pre>' + result + '</pre></body></html>' );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function checekedfasta ()
{
  var selectedRows = $( 'input.select-row:checked' ).closest( 'tr' );

  var AVR_I_SSAPNos = [];
  table.rows( { page: 'all' } ).nodes().each( function ( row )
  {
    var $row = $( row );
    if ( $row.find( 'input.select-row:checked' ).length > 0 )
    {
      var AVR_I_SSAPNo = $row.find( 'td:eq(1)' ).text();
      AVR_I_SSAPNos.push( AVR_I_SSAPNo );
    }
  } );
  if ( AVR_I_SSAPNos.length === 0 )
  {
    alert( "No rows selected OR Table is empty!" );
    return;
  }
  var myids;
  myids += AVR_I_SSAPNos.join( ", " );
  $.ajax( {
    url: "db_query_fasta.php",
    type: "POST",
    data: { ids: myids },
    success: function ( result )
    {
      var blob = new Blob( [ result ], { type: "text/plain;charset=utf-8" } );
      var downloadLink = document.createElement( "a" );
      downloadLink.href = URL.createObjectURL( blob );
      downloadLink.download = "AVR_I_SSAPDB_result_selected.fasta";
      document.body.appendChild( downloadLink );
      downloadLink.click();
      document.body.removeChild( downloadLink );
    }
  } );
}

function checekedfastaPreview ()
{
  var selectedRows = $( 'input.select-row:checked' ).closest( 'tr' );

  var AVR_I_SSAPNos = [];
  table.rows( { page: 'all' } ).nodes().each( function ( row )
  {
    var $row = $( row );
    if ( $row.find( 'input.select-row:checked' ).length > 0 )
    {
      var AVR_I_SSAPNo = $row.find( 'td:eq(1)' ).text();
      AVR_I_SSAPNos.push( AVR_I_SSAPNo );
    }
  } );
  if ( AVR_I_SSAPNos.length === 0 )
  {
    alert( "No rows selected OR Table is empty!" );
    return;
  }
  var myids;
  myids += AVR_I_SSAPNos.join( ", " );
  $.ajax( {
    url: "db_query_fasta.php",
    type: "POST",
    data: { ids: myids },
    success: function ( result )
    {
      var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
      if ( popup === null || typeof ( popup ) == 'undefined' )
      {
        alert( 'Popup blocked. Please allow popups for this website and try again.' );
        return;
      }
      popup.document.write( '<html><head><title>Checked Result Preview in Fasta Format</title></head><body><pre>' + result + '</pre></body></html>' );
    }
  } );
}

function selectAllRowsfasta ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  var searchValue = table.search();
  table.rows( { search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();

    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    $.ajax( {
      url: "db_query_fasta.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var blob = new Blob( [ result ], { type: "text/plain;charset=utf-8" } );
        var downloadLink = document.createElement( "a" );
        downloadLink.href = URL.createObjectURL( blob );
        downloadLink.download = "AVR_I_SSAPDB_result_all.fasta";
        document.body.appendChild( downloadLink );
        downloadLink.click();
        document.body.removeChild( downloadLink );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function selectAllRowsfastaPreview ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  var searchValue = table.search();
  table.rows( { search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();

    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    $.ajax( {
      url: "db_query_fasta.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
        if ( popup === null || typeof ( popup ) == 'undefined' )
        {
          alert( 'Popup blocked. Please allow popups for this website and try again.' );
          return;
        }
        popup.document.write( '<html><head><title>All Page Result Preview in FASTA Format</title></head><body><pre>' + result + '</pre></body></html>' );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function perPageSelectedAVRISSAPDBNosfasta ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  table.rows( { page: 'current', search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();
    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    $.ajax( {
      url: "db_query_fasta.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var blob = new Blob( [ result ], { type: "text/plain;charset=utf-8" } );
        var downloadLink = document.createElement( "a" );
        downloadLink.href = URL.createObjectURL( blob );
        downloadLink.download = "AVR_I_SSAPDB_result_current_page.fasta";
        document.body.appendChild( downloadLink );
        downloadLink.click();
        document.body.removeChild( downloadLink );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function perPageSelectedAVRISSAPDBNosfastaPreview ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  table.rows( { page: 'current', search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();

    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    console.log( myIds );
    $.ajax( {
      url: "db_query_fasta.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
        if ( popup === null || typeof ( popup ) == 'undefined' )
        {
          alert( 'Popup blocked. Please allow popups for this website and try again.' );
          return;
        }
        popup.document.write( '<html><head><title>Current Page Result Preview in FASTA Format</title></head><body><pre>' + result + '</pre></body></html>' );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function checekedlist ()
{
  var selectedRows = $( 'input.select-row:checked' ).closest( 'tr' );

  var AVR_I_SSAPNos = [];
  table.rows( { page: 'all' } ).nodes().each( function ( row )
  {
    var $row = $( row );
    if ( $row.find( 'input.select-row:checked' ).length > 0 )
    {
      var AVR_I_SSAPNo = $row.find( 'td:eq(1)' ).text();
      AVR_I_SSAPNos.push( AVR_I_SSAPNo );
    }
  } );
  if ( AVR_I_SSAPNos.length === 0 )
  {
    alert( "No rows selected OR Table is empty!" );
    return;
  }
  var myids;
  myids += AVR_I_SSAPNos.join( ", " );
  $.ajax( {
    url: "db_query_list.php",
    type: "POST",
    data: { ids: myids },
    success: function ( result )
    {
      var blob = new Blob( [ result ], { type: "text/plain;charset=utf-8" } );
      var downloadLink = document.createElement( "a" );
      downloadLink.href = URL.createObjectURL( blob );
      downloadLink.download = "AVR_I_SSAPDB_result_selected.list";
      document.body.appendChild( downloadLink );
      downloadLink.click();
      document.body.removeChild( downloadLink );
    }
  } );
}

function checekedlistPreview ()
{
  var selectedRows = $( 'input.select-row:checked' ).closest( 'tr' );

  var AVR_I_SSAPNos = [];
  table.rows( { page: 'all' } ).nodes().each( function ( row )
  {
    var $row = $( row );
    if ( $row.find( 'input.select-row:checked' ).length > 0 )
    {
      var AVR_I_SSAPNo = $row.find( 'td:eq(1)' ).text();
      AVR_I_SSAPNos.push( AVR_I_SSAPNo );
    }
  } );
  if ( AVR_I_SSAPNos.length === 0 )
  {
    alert( "Table is empty!" );
    return;
  }
  var myids;
  myids += AVR_I_SSAPNos.join( ", " );
  $.ajax( {
    url: "db_query_list.php",
    type: "POST",
    data: { ids: myids },
    success: function ( result )
    {
      var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
      if ( popup === null || typeof ( popup ) == 'undefined' )
      {
        alert( 'Popup blocked. Please allow popups for this website and try again.' );
        return;
      }
      popup.document.write( '<html><head><title>Checked Result Preview in List Format</title></head><body><pre>' + result + '</pre></body></html>' );
    }
  } );
}

function selectAllRowslist ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  var searchValue = table.search();
  table.rows( { search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();

    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    $.ajax( {
      url: "db_query_list.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var blob = new Blob( [ result ], { type: "text/plain;charset=utf-8" } );
        var downloadLink = document.createElement( "a" );
        downloadLink.href = URL.createObjectURL( blob );
        downloadLink.download = "AVR_I_SSAPDB_result_all.list";
        document.body.appendChild( downloadLink );
        downloadLink.click();
        document.body.removeChild( downloadLink );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function selectAllRowslistPreview ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  var searchValue = table.search();
  table.rows( { search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();

    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    $.ajax( {
      url: "db_query_list.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
        if ( popup === null || typeof ( popup ) == 'undefined' )
        {
          alert( 'Popup blocked. Please allow popups for this website and try again.' );
          return;
        }
        popup.document.write( '<html><head><title>All Page Result Preview in List Format</title></head><body><pre>' + result + '</pre></body></html>' );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function perPageSelectedAVRISSAPDBNoslist ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  table.rows( { page: 'current', search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();
    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    $.ajax( {
      url: "db_query_list.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var blob = new Blob( [ result ], { type: "text/plain;charset=utf-8" } );
        var downloadLink = document.createElement( "a" );
        downloadLink.href = URL.createObjectURL( blob );
        downloadLink.download = "AVR_I_SSAPDB_result_current_page.list";
        document.body.appendChild( downloadLink );
        downloadLink.click();
        document.body.removeChild( downloadLink );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function perPageSelectedAVRISSAPDBNoslistPreview ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  table.rows( { page: 'current', search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();

    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    $.ajax( {
      url: "db_query_list.php",
      type: "POST",
      data: { ids: myIds },
      success: function ( result )
      {
        var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
        if ( popup === null || typeof ( popup ) == 'undefined' )
        {
          alert( 'Popup blocked. Please allow popups for this website and try again.' );
          return;
        }
        popup.document.write( '<html><head><title>Current Page Result Preview in List Format</title></head><body><pre>' + result + '</pre></body></html>' );
        location.reload();
      }
    } );
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function downloadJSONCurrent ()
{
  var filteredData = table.rows( { page: "current" } ).data().toArray();
  if ( filteredData.length === 0 )
  {
    alert( "No data found!" );
    return;
  }
  var jsonContent = JSON.stringify( filteredData );
  var encodedUri = encodeURI( "data:text/json;charset=utf-8," + jsonContent );
  var link = document.createElement( "a" );
  link.setAttribute( "href", encodedUri );
  link.setAttribute( "download", "AVR_I_SSAPDB_result_current_page.json" );
  document.body.appendChild( link );
  link.click();
}

function downloadJSON ()
{
  var selectedRows = $( 'input.select-row:checked' ).closest( 'tr' );
  if ( selectedRows.length === 0 )
  {
    alert( "No rows selected!" );
    return;
  }

  var selectedData = [];
  table.rows( { search: "applied" } ).nodes().each( function ( row )
  {
    var rowData = table.row( row ).data();
    if ( $( 'input.select-row', row ).is( ':checked' ) )
    {
      selectedData.push( rowData );
    }
  } );

  var jsonContent = "data:text/json;charset=utf-8," + encodeURIComponent( JSON.stringify( selectedData ) );
  var link = document.createElement( "a" );
  link.setAttribute( "href", jsonContent );
  link.setAttribute( "download", "AVR_I_SSAPDB_result_Selected.json" );
  document.body.appendChild( link );
  link.click();
}

function downloadFilteredjson ()
{
  var filteredData = table.rows( { search: "applied" } ).data().toArray();
  if ( filteredData.length === 0 )
  {
    alert( "No data found!" );
    return;
  }

  var jsonData = JSON.stringify( filteredData );

  var encodedUri = "data:text/json;charset=utf-8," + encodeURIComponent( jsonData );
  var link = document.createElement( "a" );
  link.setAttribute( "href", encodedUri );
  link.setAttribute( "download", "AVR_I_SSAPDB_result_all.json" );
  document.body.appendChild( link );

  setTimeout( function ()
  {
    link.click();
  }, 100 );
}

function downloadtsvCurrent ()
{
  var filteredData = table.rows( { page: "current" } ).data().toArray();


  if ( filteredData.length === 0 )
  {
    alert( "No data found!" );
    return;
  }

  var tsvContent = "data:text/tsv;charset=utf-8,";
  var headers = Object.keys( filteredData[ 0 ] );
  tsvContent += headers.join( "\t" ) + "\r\n";
  filteredData.forEach( function ( rowData )
  {
    var row = [];
    headers.forEach( function ( header )
    {
      row.push( rowData[ header ] );
    } );
    tsvContent += row.join( "\t" ) + "\r\n";
  } );

  var encodedUri = encodeURI( tsvContent );
  var link = document.createElement( "a" );
  link.setAttribute( "href", encodedUri );
  link.setAttribute( "download", "AVR_I_SSAPDB_result_current_page.tsv" );
  document.body.appendChild( link );
  link.click();
}

function downloadtsv ()
{
  var selectedRows = $( 'input.select-row:checked' ).closest( 'tr' );
  if ( selectedRows.length === 0 )
  {
    alert( "No rows selected!" );
    return;
  }

  var selectedData = [];
  table.rows( { search: "applied" } ).nodes().each( function ( row )
  {
    var rowData = table.row( row ).data();
    if ( $( 'input.select-row', row ).is( ':checked' ) )
    {
      selectedData.push( rowData );
    }
  } );

  var tsvContent = "data:text/tsv;charset=utf-8,";
  var headers = Object.keys( selectedData[ 0 ] );
  tsvContent += headers.join( "\t" ) + "\r\n";
  selectedData.forEach( function ( rowData )
  {
    var row = [];
    headers.forEach( function ( header )
    {
      row.push( rowData[ header ] );
    } );
    tsvContent += row.join( "\t" ) + "\r\n";
  } );

  var encodedUri = encodeURI( tsvContent );
  var link = document.createElement( "a" );
  link.setAttribute( "href", encodedUri );
  link.setAttribute( "download", "AVR_I_SSAPDB_result_selected.tsv" );
  document.body.appendChild( link );
  link.click();
}

function downloadFilteredtsv ()
{
  var filteredData = table.rows( { search: "applied" } ).data().toArray();
  if ( filteredData.length === 0 )
  {
    alert( "No data found!" );
    return;
  }

  var tsvContent = "data:text/tsv;charset=utf-8,";
  var headers = Object.keys( filteredData[ 0 ] );
  tsvContent += headers.join( "\t" ) + "\r\n";
  filteredData.forEach( function ( rowData )
  {
    var row = [];
    headers.forEach( function ( header )
    {
      row.push( rowData[ header ] );
    } );
    tsvContent += row.join( "\t" ) + "\r\n";
  } );

  var encodedUri = encodeURI( tsvContent );
  var link = document.createElement( "a" );
  link.setAttribute( "href", encodedUri );
  link.setAttribute( "download", "AVR_I_SSAPDB_result_all.tsv" );
  document.body.appendChild( link );
  link.click();
}

function downloadtsvCurrentDisplay ()
{
  var filteredData = table.rows( { page: "current" } ).data().toArray();

  if ( filteredData.length === 0 )
  {
    alert( "No data found!" );
    return;
  }

  var tsvContent = "data:text/tsv;charset=utf-8\n";
  var headers = Object.keys( filteredData[ 0 ] );
  tsvContent += headers.join( "\t" ) + "\r\n";
  filteredData.forEach( function ( rowData )
  {
    var row = [];
    headers.forEach( function ( header )
    {
      row.push( rowData[ header ] );
    } );
    tsvContent += row.join( "\t" ) + "\r\n";
  } );

  var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
  if ( popup === null || typeof ( popup ) == 'undefined' )
  {
    alert( 'Popup blocked. Please allow popups for this website and try again.' );
    return;
  }
  popup.document.write( '<html><head><title>Current Page Result Preview in tsv Format</title></head><body><pre>' + tsvContent + '</pre></body></html>' );

}

function downloadtsvDisplay ()
{
  var selectedRows = $( 'input.select-row:checked' ).closest( 'tr' );
  if ( selectedRows.length === 0 )
  {
    alert( "No rows selected!" );
    return;
  }

  var selectedData = [];
  table.rows( { search: "applied" } ).nodes().each( function ( row )
  {
    var rowData = table.row( row ).data();
    if ( $( 'input.select-row', row ).is( ':checked' ) )
    {
      selectedData.push( rowData );
    }
  } );

  var tsvContent = "data:text/tsv;charset=utf-8\n";
  var headers = Object.keys( selectedData[ 0 ] );
  tsvContent += headers.join( "\t" ) + "\r\n";
  selectedData.forEach( function ( rowData )
  {
    var row = [];
    headers.forEach( function ( header )
    {
      row.push( rowData[ header ] );
    } );
    tsvContent += row.join( "\t" ) + "\r\n";
  } );

  var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
  if ( popup === null || typeof ( popup ) == 'undefined' )
  {
    alert( 'Popup blocked. Please allow popups for this website and try again.' );
    return;
  }
  popup.document.write( '<html><head><title>Selected Result Preview in tsv Format</title></head><body><pre>' + tsvContent + '</pre></body></html>' );

}

function downloadFilteredDisplaytsv ()
{
  var filteredData = table.rows( { search: "applied" } ).data().toArray();
  if ( filteredData.length === 0 )
  {
    alert( "No data found!" );
    return;
  }

  var tsvContent = "data:text/tsv;charset=utf-8\n";
  var headers = Object.keys( filteredData[ 0 ] );
  tsvContent += headers.join( "\t" ) + "\r\n";
  filteredData.forEach( function ( rowData )
  {
    var row = [];
    headers.forEach( function ( header )
    {
      row.push( rowData[ header ] );
    } );
    tsvContent += row.join( "\t" ) + "\r\n";
  } );

  var popup = window.open( '', 'Filtered Data', 'width=' + screen.availWidth + ',height=' + screen.availHeight );
  if ( popup === null || typeof ( popup ) == 'undefined' )
  {
    alert( 'Popup blocked. Please allow popups for this website and try again.' );
    return;
  }
  popup.document.write( '<html><head><title>All Result Preview in tsv Format</title></head><body><pre>' + tsvContent + '</pre></body></html>' );
}

function checekedCustom ()
{
  var selectedRows = $( 'input.select-row:checked' ).closest( 'tr' );
  var spdbNos = [];
  table.rows( { page: 'all' } ).nodes().each( function ( row )
  {
    var $row = $( row );
    if ( $row.find( 'input.select-row:checked' ).length > 0 )
    {
      var spdbNo = $row.find( 'td:eq(1)' ).text();
      spdbNos.push( spdbNo );
    }
  } );
  if ( spdbNos.length === 0 )
  {
    alert( "No rows selected OR Table is empty!" );
    return;
  }
  var myids;
  myids += spdbNos.join( "," );
  myids.replace( /undefined/g, "" );
  if ( myids.length == 8 )
  {
    alert( "No rows selected!" );
    return;
  }
  else
  {
    document.getElementById( 'ids' ).value = myids.replace( /undefined/g, "" );
    document.getElementById( 'myForm' ).submit();
  }
}


function selectAllRowsCustom ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  var searchValue = table.search();
  table.rows( { search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();

    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {

    var myIds;
    myIds += selectedRows.join( ',' );
    document.getElementById( 'ids' ).value = myIds.replace( /undefined/g, "" );
    document.getElementById( 'myForm' ).submit();
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}

function perPageSelectedspdbidsCustom ()
{
  var table = $( '#myDataTable' ).DataTable();
  var selectedRows = [];
  table.rows( { page: 'current', search: 'applied' } ).every( function ()
  {
    var rowData = this.data();
    var rowNode = this.node();
    if ( $( rowNode ).find( 'input[type="checkbox"]' ).length > 0 )
    {
      $( rowNode ).find( 'input[type="checkbox"]' ).prop( 'checked', true );
      selectedRows.push( rowData.AVR_I_SSAPDB_ID );
    }
  } );
  if ( selectedRows.length > 0 )
  {
    var myIds;
    myIds += selectedRows.join( ',' );
    document.getElementById( 'ids' ).value = myIds.replace( /undefined/g, "" );
    document.getElementById( 'myForm' ).submit();
  } else
  {
    alert( 'Table is empty OR no rows selected.' );
  }
}