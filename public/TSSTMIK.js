/**
 * Utility TSSTMIK yfktn@15102015
 */
var TSSTMIK = {
    /**
     * Hilangkan penanda error pada form dgn bootstrap css style, dgn asumsi bahwa eId adalah id milik komponen yang
     * menjadi tempat untuk menampilkan error.
     * @param eId
     */
    resetFormErrorMsg:function(eId){
        $(eId).addClass('hidden')
            .closest('div.form-group').removeClass('has-error');
    },
    /**
     * Tampilkan error pada masing2 element, dgn asumsi bahwa tempat error ditampilkan memiliki element HTML dengan
     * nama id: <nama_field>-error; ex: email-error.
     * @param responseText adalah kembalian dari hasil proses ajax dgn format JSON!
     */
    showFormErrorMsg:function(responseText){
        $.each($.parseJSON(responseText),function(i,v){
            $('#'+i+'-error').removeClass('hidden').empty().append(v.toString())
                .closest('div.form-group').addClass('has-error');
        });
    }
};
