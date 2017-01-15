window.Parsley
    .addValidator('fileMimeTypes', {
        requirementType: 'string',
        validateString: function(value, requirement, parsleyInstance){
            var file = parsleyInstance.$element[0].files;

            if(file.length == 0){
                return true;
            }

            var allowedMimeTypes = requirement.replace(/\s/g, "").split(',');
            console.log(file[0].type);
            return allowedMimeTypes.indexOf(file[0].type) !== -1;
        },
        messages: {
            en: 'File mime type not allowed'
        }
    });