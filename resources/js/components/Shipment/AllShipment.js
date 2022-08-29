import React from 'react'
import Link from "@material-ui/core/Link";

const AllShipment = () => {

   return (
       <div className="container">
           <div className="row">
               <div className="col-md-12">
                   <div className="card">
                       <div className="card-header">
                           <h4>All Shipments
                               <Link to={'add-shipment'} className='btn btn-primary btn-sm float-end' >Add Shipment</Link>
                           </h4>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   );


};

export default AllShipment;
