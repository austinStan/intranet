import React from "react";

export default function StaffSmallCard() {
    return (
        <div className="col-sm-12 mt-3" style={{}}>
            <div className="new-staff-card" style={{}}>
                <img
                    src="https://cdn.pixabay.com/photo/2017/01/29/21/16/nurse-2019420__340.jpg"
                    alt="Staff name"
                    className="image-fluid rounded"
                    style={{}}
                />

                <h5 className="text-center mt-2 font-weight-bold">
                    Staff Name Goes Here
                </h5>

                <p className="text-center">Department</p>
            </div>
        </div>
    );
}
