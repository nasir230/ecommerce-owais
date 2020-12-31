import React from 'react';

export default function Card(Props){
      
    return (
        <>
            <div className="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <a href="http://127.0.0.1:8000/admin/upload/sitelogo.png" data-sub-html="Demo Description">
                <img className="img-responsive thumbnail" src={Props.image} alt="" /> 
                    </a>
    <a className="text-dark" href="http://127.0.0.1:8000/admin/upload/sitelogo.png"><h4 className="py-2 text-center">{Props.name}</h4></a>
            </div>
        </>
    );
}

