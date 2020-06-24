import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

export default function StaffMembers({ staff }) {
    // console.log(staff);
    return (
        <div className="col-sm-12 col-md-6 col-lg-4 mt-5">
            <div className="staff-component">
                <InertiaLink href={`/staff/${staff.id}`}>
                    <img
                        className=" img-fluid"
                        src={staff.image ? staff.image : staff.name}
                        alt={staff.name ? staff.name : "Staff members name"}
                        style={{
                            borderRadius: "10px",
                            width: "100%",
                            height: "250px"
                        }}
                    />
                </InertiaLink>

                <div className="" style={{}}>
                    <h4 className="text-center mt-2">
                        {staff && staff.name ? staff.name : ""}
                    </h4>

                    <p className="text-center">
                        {staff && staff.email ? staff.email : ""}
                    </p>

                    <p className="text-center">
                        {staff && staff.department ? staff.department : ""}
                    </p>
                </div>
            </div>
        </div>
    );
}
