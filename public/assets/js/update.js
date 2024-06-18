
//main Images code 
mainImage = document.getElementById('mainImages');
primaryImage = document.getElementById('primaryImage');
if(mainImage)
{
    mainImage.addEventListener('change',function(e){
        src= URL.createObjectURL(e.target.files[0]);
        primaryImage.setAttribute('src',src)
    })
}
//user image upload script
profileImage = document.getElementById('upload');
imagePView = document.getElementById('imagePView');
if(profileImage)
{
   
    profileImage.addEventListener('change',function(e){
        src=URL.createObjectURL(e.target.files[0]);
        imagePView.setAttribute('src',src)
    })
}
//Product slider images
productImages = document.getElementById('productImages');
productImagesinput = document.getElementById('productImagesinput');
if(productImagesinput)
{
    productImagesinput.addEventListener('change',function(e){
        files = e.target.files
        for (let i = 0; i < files.length; i++) {
            productImages.innerHTML += `<img src="${URL.createObjectURL(files[i])}" style="width:20%; height:20%; border-radius:8px;">`
        }
    })
}

// Category Updates script
edtbtns = document.getElementsByClassName('edtbtns');
if(edtbtns)
{
    for(let i = 0; i < edtbtns.length; i++) {
        edtbtns[i].addEventListener('click',function(e){
            
            if(document.getElementById('parentcat'))
            {
                document.getElementById('parentcat').value = edtbtns[i].getAttribute('data-parentcatid');
            }
            if(document.getElementById('brand'))
            {
                document.getElementById('brand').value = edtbtns[i].getAttribute('data-brandid');
            }
            id = edtbtns[i].getAttribute('data-id');
            categoryName = edtbtns[i].getAttribute('data-name');
            imagePath = edtbtns[i].getAttribute('data-imagepath');
            tags = edtbtns[i].getAttribute('data-tags');
            featured = edtbtns[i].getAttribute('data-featured');
            document.getElementById('categoryname').value = categoryName;
            document.getElementById('id').value = id
            if(document.getElementById('taggs'))
            {
            document.getElementById('taggs').innerHTML = `<label for="emailWithTitle" class="form-label">Category Tags</label>
            <input
              type="text"
              placeholder="Category Tags"
              class="form-control"
              name="tags"
              data-role="tagsinput"
              value= "${tags}"
            />`;               
            }
            if(featured ==1)
            {
                document.getElementById('isfeatured').innerHTML = `<label class="form-label" for="basic-default-password12">isFeatured</label>
                <div class="input-group">
                  <select  class="form-control" name="isfeatured" required>
                      <option value="1" selected>No</option>
                      <option value="0">yes</option>
                  </select>
                </div>`;
            }else
            {
                if(document.getElementById('isfeatured'))
                {
                    document.getElementById('isfeatured').innerHTML = `<label class="form-label" for="basic-default-password12">isFeatured</label>
                    <div class="input-group">
                      <select  class="form-control" name="isfeatured" required>
                          <option value="1">No</option>
                          <option value="0" selected>yes</option>
                      </select>
                    </div>`;
                }
            }
            if(imagePath)
            { 
                if(document.getElementById('existimage'))
                {
                    document.getElementById('existimage').innerHTML = ` <img  src="${imagePath}" style="width:100%;height:400px;">`; 
                }
            }else
            {
                if(document.getElementById('existimage'))
                {
                   document.getElementById('existimage').innerHTML = `<span>No Existing Image</span>`; 
                }  
            }
            if(document.getElementById('isSfeatured'))
            {
                document.getElementById('isSfeatured').value = edtbtns[i].getAttribute('data-sfeatured')
            }
            
        })
    }
}
//Feature List Update Script
featuresUpdate = document.getElementsByClassName('featuresUpdate')
if(featuresUpdate.length > 0)
{
    for (let j = 0; j < featuresUpdate.length; j++) {
        featuresUpdate[j].addEventListener('click',function(e){
               document.getElementById('id').value = featuresUpdate[j].getAttribute('data-id');
               document.getElementById('featurename').value = featuresUpdate[j].getAttribute('data-name');
               document.getElementById('featureCategory').value = featuresUpdate[j].getAttribute('data-category');
        })
        
    }
}
//outdoor List Update Script
outdoorName = document.getElementsByClassName('outdoorUpdate');
if(outdoorName.length > 0)
{
    for (let k = 0; k < outdoorName.length; k++) {
        outdoorName[k].addEventListener('click',function(e){
            document.getElementById('id').value = outdoorName[k].getAttribute('data-id');
            document.getElementById('outdoorName').value = outdoorName[k].getAttribute('data-name');
            document.getElementById('outdoorCategory').value = outdoorName[k].getAttribute('data-category');
        })
    }
}
//indoor List Update Script
indoorName = document.getElementsByClassName('indoorUpdate');
if(indoorName.length > 0)
{
    for (let l = 0; l < indoorName.length; l++) {
        indoorName[l].addEventListener('click',function(e){
            document.getElementById('id').value = indoorName[l].getAttribute('data-id');
            document.getElementById('indoorName').value = indoorName[l].getAttribute('data-name');
            document.getElementById('indoorCategory').value = indoorName[l].getAttribute('data-category');
        })
    }
}
//Users Details Update Script 
edituser = document.getElementsByClassName('edituser');
updateprofileImage = document.getElementById('updateupload');
updateimagePView = document.getElementById('updateimagePView');
if(updateprofileImage)
{
    updateprofileImage.addEventListener('change',function(e){
        src=URL.createObjectURL(e.target.files[0]);
        updateimagePView.setAttribute('src',src)
    })
}
if(edituser.length >0)
{
    for (let f = 0; f < edituser.length; f++) {
        edituser[f].addEventListener('click',function(e){
            document.getElementById('updatename').value = edituser[f].getAttribute('data-name');
            document.getElementById('updateemail').value = edituser[f].getAttribute('data-email');
            document.getElementById('updatephoneNumber').value = edituser[f].getAttribute('data-phone');
            document.getElementById('updateeaddress').value = edituser[f].getAttribute('data-address');
            document.getElementById('countr').value = edituser[f].getAttribute('data-country');
            document.getElementById('stat').innerHTML= `<option value="${edituser[f].getAttribute('data-state')}">${edituser[f].getAttribute('data-state')}</option>`;
            document.getElementById('updatecity').value = edituser[f].getAttribute('data-city')
            document.getElementById('updatezipCode').value = edituser[f].getAttribute('data-zipcode');
            document.getElementById('updaterole').value = edituser[f].getAttribute('data-role');
            document.getElementById('id').value = edituser[f].getAttribute('data-id');
            imagep = edituser[f].getAttribute('data-image');
            if(imagep != "No Url")
            {
                document.getElementById('updateimagePView').setAttribute('src',edituser[f].getAttribute('data-image'))
            }else
            {
                document.getElementById('updateimagePView').setAttribute('src','../assets/img/avatars/1.png')
            }
            if(document.getElementById('exper'))
            {
                document.getElementById('exper').value = edituser[f].getAttribute('data-expr')
                divElement = document.querySelector(".bootstrap-tagsinput");
                document.getElementById('sklllls').value = edituser[f].getAttribute('data-skills');
                document.getElementById('crtf').value = edituser[f].getAttribute('data-certificate')
                document.getElementById('vendorcertificate').innerHTML= `<iframe src="${edituser[f].getAttribute('data-certficate')}" title="description" style="width:100%;height:100%;"></iframe>`
            }
        })
    }
}
//properties details update script
pDUpdate = document.getElementsByClassName('pDUpdate');
if(pDUpdate.length > 0)
{
    for (let z = 0; z < pDUpdate.length; z++) {
        pDUpdate[z].addEventListener('click',function(e){
            document.getElementById('sqr_meter').value = pDUpdate[z].getAttribute('data-sqr_meter')
            document.getElementById('sqr_feet').value = pDUpdate[z].getAttribute('data-sqr_feet')
            document.getElementById('constructiondate').value = pDUpdate[z].getAttribute('data-constructiondata')
            document.getElementById('nextrenovation').value = pDUpdate[z].getAttribute('data-nextRenovation')
            document.getElementById('rooms').value = pDUpdate[z].getAttribute('data-rooms')
            document.getElementById('floor').value = pDUpdate[z].getAttribute('data-floor')
            document.getElementById('id').value = pDUpdate[z].getAttribute('data-id');
        })
    }
}

//owner Details
editowner = document.getElementsByClassName('editowner');
updateownerprofileImage = document.getElementById('ownerupload');
updateownerimagePView = document.getElementById('ownerimagePView');
if(updateownerprofileImage)
{
    
    updateownerprofileImage.addEventListener('change',function(e){
        srcc=URL.createObjectURL(e.target.files[0]);
        updateownerimagePView.setAttribute('src',srcc)
    })
}
if(editowner.length > 0)
{
    for (let h = 0; h < editowner.length; h++) {
        editowner[h].addEventListener('click',function(e){
            image = editowner[h].getAttribute('data-img')
            console.log(image)
            updateownerimagePView.setAttribute('src',image)
            document.getElementById('id').value = editowner[h].getAttribute('data-id');
            document.getElementById('ownername').value = editowner[h].getAttribute('data-name');
            document.getElementById('owneremail').value = editowner[h].getAttribute('data-email');
            document.getElementById('ownerphoneNumber').value = editowner[h].getAttribute('data-phone');
            document.getElementById('owneraddress').value = editowner[h].getAttribute('data-address');
            document.getElementById('ownercountry').value = editowner[h].getAttribute('data-country');
            document.getElementById('ownerstate').value= editowner[h].getAttribute('data-state');
            document.getElementById('ownercity').value = editowner[h].getAttribute('data-city')
            document.getElementById('ownerzipCode').value =editowner[h].getAttribute('data-zipcode');
            imagep = editowner[h].getAttribute('data-img');
            if(imagep != "No Url")
            {
                updateownerimagePView.setAttribute('src',editowner[h].getAttribute('data-img'))
            }else
            {
                updateownerimagePView.setAttribute('src','../assets/img/avatars/1.png')
            }
        })
    }
}
// siteengineer update details
approveProperty = document.getElementsByClassName('approveProperty')
if(approveProperty.length > 0)
{
    for (let gh = 0; gh < approveProperty.length; gh++) {
        approveProperty[gh].addEventListener('click',function(e){
            if(document.getElementById('approves'))
            {
                document.getElementById('approves').value = approveProperty[gh].getAttribute('data-isApproved')
            }
            document.getElementById('id').value = approveProperty[gh].getAttribute('data-id')
            document.getElementById('remarks').value = approveProperty[gh].getAttribute('data-remarks')
            document.getElementById('ownerId').value = approveProperty[gh].getAttribute('data-owner')
            document.getElementById('aggstart').value = approveProperty[gh].getAttribute('data-aggdate')
            document.getElementById('aggends').value = approveProperty[gh].getAttribute('data-addend')
            if(document.getElementById('package'))
            {
            document.getElementById('package').value = approveProperty[gh].getAttribute('data-packagesID')
            }
            document.getElementById('proid').value = approveProperty[gh].getAttribute('data-properID')
            document.getElementById('packageAmount').value = approveProperty[gh].getAttribute('data-pacamount')
            
        })
    }
}
//near by me attackvalues
attch = document.getElementsByClassName('attch')
attchvalue = document.getElementsByClassName('attchvalue')
if(attch.length > 0)
{
    for (let ll = 0; ll < attch.length; ll++) {
        attchvalue[ll].addEventListener('focusout',function(e){
            valueattribute = attch[ll].value+' '+'near by '+' '+attchvalue[ll].value
            attch[ll].value = valueattribute
        })
    }
}
//add fields by role
selectrole = document.getElementById('selectrole');
addvendorfileds = document.getElementById('addvendorfileds');
addfileds = document.getElementById('addfileds');
if(selectrole)
{
    selectrole.addEventListener('change',function(e){
        if(selectrole.value == 3)
        {
            addfileds.style.display = 'flex'               
        }else
        {
            addfileds.style.display = 'none'
        }
    })
}
if(document.getElementById('updaterole'))
{
    if(document.getElementById('updaterole').value == 0 || document.getElementById('updaterole').value == 2 || document.getElementById('updaterole').value == 7 || document.getElementById('updaterole').value == 4)
    {
        if(document.getElementById('addsfileds'))
        {

            document.getElementById('addsfileds').style.display = 'none'        
        }
    }else
    {
        if(document.getElementById('addsfileds'))
        {
            document.getElementById('addsfileds').style.display = 'flex'
        }    
    }
    document.getElementById('updaterole').addEventListener('change',function(e){
        if(document.getElementById('updaterole').value == 0 || document.getElementById('updaterole').value == 2 || document.getElementById('updaterole').value == 7 || document.getElementById('updaterole').value == 4)
        {
            document.getElementById('addsfileds').style.display = 'none'        
        }else
        {
            document.getElementById('addsfileds').style.display = 'flex'
        }
    })
}

//deptUpdate
deptUpdate = document.getElementsByClassName('deptUpdate');
if(deptUpdate.length >0)
{
    for (let dp = 0; dp < deptUpdate.length; dp++) {
        
        deptUpdate[dp].addEventListener('click',function(e){
            document.getElementById('dept_name').value =deptUpdate[dp].getAttribute('data-name')
            document.getElementById('id').value =deptUpdate[dp].getAttribute('data-id')
        })
        
    }
}
//services update
updateservices = document.getElementsByClassName('updateservices');
if(updateservices.length >0)
{
    for (let us = 0; us < updateservices.length; us++) {
        
        updateservices[us].addEventListener('click',function(e){
            document.getElementById('servicename').value = updateservices[us].getAttribute('data-name');
            document.getElementById('did').value =  parseInt(updateservices[us].getAttribute('data-deptid'))
            document.getElementById('servicefor').value =  parseInt(updateservices[us].getAttribute('data-servicefor'))
            document.getElementById('id').value =  parseInt(updateservices[us].getAttribute('data-id'))
            document.getElementById('parent').value =  parseInt(updateservices[us].getAttribute('data-parent'))
            document.getElementById('amount').value =  parseInt(updateservices[us].getAttribute('data-amount'))
            document.getElementById('description').innerText =  updateservices[us].getAttribute('data-description')
            document.getElementById('serviceimage').innerHTML = `<img src="${updateservices[us].getAttribute('data-imagepath')}" style="width:100px;height:100px;">`
        })
    }
}
//assign edit js
editAssign = document.getElementsByClassName('editAssign')
if(editAssign.length > 0)
{
    for (let ea = 0; ea < editAssign.length; ea++) {
        editAssign[ea].addEventListener('click',function(e){
            document.getElementById('propertyID').value = editAssign[ea].getAttribute('data-propid')
            document.getElementById('department').value = editAssign[ea].getAttribute('data-deptID')
            document.getElementById('old_services').value = editAssign[ea].getAttribute('data-serviceId')
            document.getElementById('superVisiorID').value = editAssign[ea].getAttribute('data-supervisor')
            document.getElementById('id').value = editAssign[ea].getAttribute('data-id')
        })
    }
}
//editExpenses
editexpenses =  document.getElementsByClassName('editexpenses');
if(editexpenses.length > 0)
{
    for (let exp = 0; exp < editexpenses.length; exp++) {
        editexpenses[exp].addEventListener('click',function(e){
            document.getElementById('id').value = editexpenses[exp].getAttribute('data-id')
             document.getElementById('propertyID').value = editexpenses[exp].getAttribute('data-propID')
             document.getElementById('upbrowser').value = editexpenses[exp].getAttribute('data-exptype')
             document.getElementById('expDate').value = editexpenses[exp].getAttribute('data-date')
             document.getElementById('amount').value = editexpenses[exp].getAttribute('data-amount')
             document.getElementById('expDescription').value = editexpenses[exp].getAttribute('data-expDescription')
             document.getElementById('fileAttachment').innerHTML = `<iframe src="${editexpenses[exp].getAttribute('data-file_path')}" title="description" style="width:100%;height:100px;"></iframe>`
        }) 
    }
}
//property for js
propertyFor = document.getElementById('propertyFor');
if(propertyFor)
{
    propertyFor.addEventListener('change',function(){
        if(propertyFor.value == 0 || propertyFor.value == 2)
        {
            document.getElementById('propUnit').style.display = 'block'
        }else
        {
            document.getElementById('propUnit').style.display = 'none'
        }
    })
}
//rentype js on property on board
rentype = document.getElementById('rentype');
if(rentype)
{
    rentype.addEventListener('change',function(e){
        if(rentype.value == 2)
        {
            customfield = document.getElementsByClassName('customfield');
            if(customfield.length > 0)
            {
                for (let cf = 0; cf < customfield.length; cf++){
                    customfield[cf].style.display = 'flex'
                }
            }
        }else
        {
            customfield = document.getElementsByClassName('customfield');
            if(customfield.length > 0)
            {
                for (let cf = 0; cf < customfield.length; cf++){
                    customfield[cf].style.display = 'none'
                }
            }
        }
    })
    if(rentype.value == 2)
        {
            customfield = document.getElementsByClassName('customfield');
            if(customfield.length > 0)
            {
                for (let cf = 0; cf < customfield.length; cf++){
                    customfield[cf].style.display = 'flex'
                }
            }
        }else
        {
            customfield = document.getElementsByClassName('customfield');
            if(customfield.length > 0)
            {
                for (let cf = 0; cf < customfield.length; cf++){
                    customfield[cf].style.display = 'none'
                }
            }
        }
}
//ticketDetails
ticketDetails = document.getElementsByClassName('ticketDetails')
if(ticketDetails.length > 0)
{
    for (let td = 0; td < ticketDetails.length; td++) {
        // ticketDetails[td].addEventListener('click',function(e){
            
            //Ticket Details 
            document.getElementById('ticketno').innerText = ticketDetails[td].getAttribute('data-ticketnumber');
            //ticket status conditons
            if(ticketDetails[td].getAttribute('data-status') == 0)
            {
                document.getElementById('status').innerHTML = '<span class="alert alert-success">open</span>'
            }else if(ticketDetails[td].getAttribute('data-status') == 1)
            {
                document.getElementById('status').innerHTML = '<span class="alert alert-warning">inProgress</span>'
            }else if(ticketDetails[td].getAttribute('data-status') == 2)
            {
                document.getElementById('status').innerHTML = '<span class="alert alert-danger">Closed</span>'
            }else if(ticketDetails[td].getAttribute('data-status') == 3)
            {
                document.getElementById('status').innerHTML = '<span class="alert alert-success">reOpen</span>'
            }
            document.getElementById('department').innerText = ticketDetails[td].getAttribute('data-department');
            document.getElementById('ticketservice').innerText = ticketDetails[td].getAttribute('data-services');
            document.getElementById('ticketissue').innerText = ticketDetails[td].getAttribute('data-issuesDescription');
            document.getElementById('ticketsubmit').innerText = ticketDetails[td].getAttribute('data-username');
            document.getElementById('ticketstart').innerText = ticketDetails[td].getAttribute('data-date');
            //Ticket Details End Here
            //Raised By 
            document.getElementById('userName').innerText = ticketDetails[td].getAttribute('data-username');
            document.getElementById('usercountry').innerText = ticketDetails[td].getAttribute('data-usercountry');
            document.getElementById('userstate').innerText = ticketDetails[td].getAttribute('data-userstate');
            document.getElementById('usercity').innerText = ticketDetails[td].getAttribute('data-usercity');
            document.getElementById('useremail').innerText = ticketDetails[td].getAttribute('data-useremail');
            document.getElementById('fulladdress').innerText = ticketDetails[td].getAttribute('data-useraddress');
            //Raised End Here
            document.getElementById('propname').innerText = ticketDetails[td].getAttribute('data-propName')
            document.getElementById('proptype').innerText = ticketDetails[td].getAttribute('data-propType')
            document.getElementById('propaddress').innerText = ticketDetails[td].getAttribute('data-address')
            document.getElementById('propcountry').innerText = ticketDetails[td].getAttribute('data-country')
            document.getElementById('propstate').innerText = ticketDetails[td].getAttribute('data-state')
            document.getElementById('propcity').innerText = ticketDetails[td].getAttribute('data-city')
            document.getElementById('proppincode').innerText = ticketDetails[td].getAttribute('data-zipcode')
            document.getElementById('propemail').innerText = ticketDetails[td].getAttribute('data-email')
            document.getElementById('propphone').innerText = ticketDetails[td].getAttribute('data-phone')
            //property for conditions
            if(ticketDetails[td].getAttribute('data-propfor') == 0)
            {
                document.getElementById('propertyfor').innerText = 'Rent'
            }else if(ticketDetails[td].getAttribute('data-propfor') == 1)
            {
                document.getElementById('propertyfor').innerText = 'Pms'
            }else if(ticketDetails[td].getAttribute('data-propfor') == 2)
            {
                document.getElementById('propertyfor').innerText = 'Both'
            }
            //Assign to 
            if(document.getElementById('svname'))
            {
                document.getElementById('svname').innerText = ticketDetails[td].getAttribute('data-svname') 
                document.getElementById('svemail').innerText = ticketDetails[td].getAttribute('data-svemail') 
                document.getElementById('svphone').innerText = ticketDetails[td].getAttribute('data-svphone') 
            }
        // })
    }
}
//assign and closed  ticket details 
editticket = document.getElementsByClassName('editticket');
if(editticket.length > 0)
{
    for (let et = 0; et < editticket.length; et++) {
        editticket[et].addEventListener('click',function(e){
            document.getElementById('idd').value = editticket[et].getAttribute('data-id');
            document.getElementById('status').value = editticket[et].getAttribute('data-status');
            if(document.getElementById('notes').value)
            {
                document.getElementById('notes').value = editticket[et].getAttribute('data-notes');
            }
        })    
    }
}
// site Engineer property view details js
siteenginner = document.getElementsByClassName('siteenginner');
if(siteenginner.length > 0)
{
    for (let seg = 0; seg < siteenginner.length; seg++) {
        siteenginner[seg].addEventListener('click',function(e){
            document.getElementById('proppname').innerText = siteenginner[seg].getAttribute('data-propname')
            document.getElementById('proppType').innerText = siteenginner[seg].getAttribute('data-proptype')
            document.getElementById('proppaddress').innerText = siteenginner[seg].getAttribute('data-propaddress')
            document.getElementById('proppcountry').innerText = siteenginner[seg].getAttribute('data-propcountry')
            document.getElementById('proppstate').innerText = siteenginner[seg].getAttribute('data-propstate')
            document.getElementById('proppcity').innerText = siteenginner[seg].getAttribute('data-propcity')
            document.getElementById('proppincode').innerText = siteenginner[seg].getAttribute('data-proppincode')
            document.getElementById('propfor').innerText = siteenginner[seg].getAttribute('data-propfor')
            document.getElementById('propPhone').innerText = siteenginner[seg].getAttribute('data-propphone')
            document.getElementById('propPEmail').innerText = siteenginner[seg].getAttribute('data-propemail')
            document.getElementById('sqrmeter').innerText = siteenginner[seg].getAttribute('data-sqrmeter')
            document.getElementById('sqrfeet').innerText = siteenginner[seg].getAttribute('data-sqrfeet')
            document.getElementById('proom').innerText = siteenginner[seg].getAttribute('data-proproom')
            document.getElementById('pfloor').innerText = siteenginner[seg].getAttribute('data-floor')
            document.getElementById('pastartdate').innerText = siteenginner[seg].getAttribute('data-aggrementstart')
            document.getElementById('paenddate').innerText = siteenginner[seg].getAttribute('data-aggrementenddate')
            document.getElementById('paenddate').innerText = siteenginner[seg].getAttribute('data-aggreenddate')
            document.getElementById('consdate').innerText = siteenginner[seg].getAttribute('data-constyear')
            document.getElementById('rendate').innerText = siteenginner[seg].getAttribute('data-renovyear')
            document.getElementById('pphone').innerText = siteenginner[seg].getAttribute('data-propphone')
            document.getElementById('pemail').innerText = siteenginner[seg].getAttribute('data-propemail')
            document.getElementById('propfac').innerText = siteenginner[seg].getAttribute('data-proputl')
            document.getElementById('propout').innerText = siteenginner[seg].getAttribute('data-propoutdoorfeatures')
            document.getElementById('propin').innerText = siteenginner[seg].getAttribute('data-indoorfeatures')
            document.getElementById('nearby').innerText = siteenginner[seg].getAttribute('data-nearby')
            document.getElementById('packagesName').innerText = siteenginner[seg].getAttribute('data-packages')
            document.getElementById('packagesType').innerText = siteenginner[seg].getAttribute('data-packages')
            document.getElementById('pacServices').innerText = siteenginner[seg].getAttribute('data-services')
            document.getElementById('pacamount').innerText = 'Rs '+siteenginner[seg].getAttribute('data-pacamount')
            //property for conditions
            if(siteenginner[seg].getAttribute('data-propfor') == 0)
            {
                document.getElementById('propfor').innerText = 'Rent'
            }else if(siteenginner[seg].getAttribute('data-propfor') == 1)
            {
                document.getElementById('propfor').innerText = 'Pms'
            }else if(siteenginner[seg].getAttribute('data-propfor') == 2)
            {
                document.getElementById('propfor').innerText = 'Both'
            }
            console.log(siteenginner[seg].getAttribute('data-units').split(","))
           
        })
    }
}
//packages services
pacserUpdate = document.getElementsByClassName('pacserUpdate');
if(pacserUpdate.length > 0)
{
    for (let ps = 0; ps < pacserUpdate.length; ps++) {
        pacserUpdate[ps].addEventListener('click',function(e){
             document.getElementById('srname').value = pacserUpdate[ps].getAttribute('data-name');
             document.getElementById('amount').value = pacserUpdate[ps].getAttribute('data-amount');
             document.getElementById('id').value = pacserUpdate[ps].getAttribute('data-id');
        })
    }
}
//packages updates
pacUpdate = document.getElementsByClassName('pacUpdate')
if(pacUpdate.length>0)
{
    for (let pc = 0; pc < pacUpdate.length; pc++) {
        pacUpdate[pc].addEventListener('click',function(e){
            document.getElementById('pcname').value = pacUpdate[pc].getAttribute('data-name');
            document.getElementById('pcamount').value = pacUpdate[pc].getAttribute('data-amount');
            document.getElementById('pctype').value = pacUpdate[pc].getAttribute('data-type');
            document.getElementById('pcid').value = pacUpdate[pc].getAttribute('data-id');
            document.getElementById('servicefor').value = parseInt(pacUpdate[pc].getAttribute('data-servicefor'));
            str = pacUpdate[pc].getAttribute('data-services');
            srvstr = str.split(',');
            ppsrc = document.getElementsByClassName('pcsr')
            for (let pcs = 0; pcs < srvstr.length; pcs++) {
                if(ppsrc[pcs].value =  srvstr[pcs])
                {
                    ppsrc[pcs].checked = true
                } 
            }
        })
    }
}
//inspection  and property data Images 
inspectionImages = document.getElementsByClassName('inspectionImages')
if(inspectionImages.length >0)
{
  for (let ins = 0; ins < inspectionImages.length; ins++) {
        
    inspectionImages[ins].addEventListener('click',function(e)
    {
        propImages = document.getElementById('propImages');
        inspImages = document.getElementById('inspImages');
        if(propImages)
        {
            imagesData = inspectionImages[ins].getAttribute('data-propImages').split(",");
            propImages.innerHTML = " "
            for (let pimg = 0; pimg < imagesData.length; pimg++) {
                console.log(imagesData[pimg])    
                propImages.innerHTML += `<div><img src="${imagesData[pimg]}" class="d-block m-auto w-100"></div><br>`;
            }
        }
        if(inspImages)
        {
            inspectionData = inspectionImages[ins].getAttribute('data-propInspection').split(",");
            if(inspectionData.length > 0)
            {
                inspImages.innerHTML = " "
                for (let pIimg = 0; pIimg < inspectionData.length; pIimg++) {
                    console.log(imagesData[pIimg])   
                    if(inspectionData[pIimg]) 
                    {
                        inspImages.innerHTML += `<div><img src="${inspectionData[pIimg]}" class="d-block m-auto w-100"></div><br>`;
                    }else
                    {
                        inspImages.innerHTML += `<div class="d-flex flex-md-column justify-content-center mt-4"><h1 class="fs-4 text-center" style="color:red;margin-top:80px;">Inspection Images Unavailable</h1></div>`;
                    }
                }
            }else
            {
                inspImages.innerHTML += `<div class="d-flex flex-md-column justify-content-center mt-4"><h1 class="fs-4 text-center" style="color:red;margin-top:80px;">Inspection Images Unavailable</h1></div>`;
            }
        }
    })
    
  }
}




