import React from "react";

export default function StaffCard() {
    return (
        <div>
            <div className="staff-card">
                {/* <img
                    className="img-fluid rounded"
                    src="https://cdn.pixabay.com/photo/2017/08/30/17/27/business-woman-2697954__340.jpg"
                    alt="Employee of the week"
                />
                <h4 className="text-center mt-2">Employee Name</h4>
                <p className="text-center">Department</p> */}

                <div>
                    <div class="parent">
                        <img
                            src="https://cdn.pixabay.com/photo/2017/08/30/17/27/business-woman-2697954__340.jpg"
                            alt="Avatar"
                            class="image"
                        />
                        <div class="overlay">
                            <h4>My Name is John</h4>
                            <p>ICT Department</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
