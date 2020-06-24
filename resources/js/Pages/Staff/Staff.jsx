import React, { useEffect } from "react";
import Layout from "../Layouts/Layout";

import StaffMembers from "../../components/StaffMembers";
import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

const Staff = ({ staff_members }) => {
    // console.log(staff_members);

    nProgress.start();
    // useEffect(() => {

    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);

    return (
        <section className=" bg-light">
            <div>
                <Banner title="Meet The Team" />

                <div className="">
                    <nav aria-label="breadcrumb ">
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item active">
                                <a href="/staff" aria-current="page">
                                    Staff
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div className="" style={{ margin: "0 8%" }}>
                <div className="row">
                    <div className="col-sm-12 col-md-3">
                        <Sidebar />
                    </div>

                    <div className="col-sm-12 col-md-9">
                        <h1 className="single-page-headings">Meet The Team</h1>

                        {/* <h4>A tem of professional and ethical medical professionals</h4> */}

                        {staff_members && staff_members.length > 0 ? (
                            <div className="row mt-5">
                                {staff_members.map(staff => (
                                    <StaffMembers
                                        key={staff.id}
                                        staff={staff}
                                    />
                                ))}
                            </div>
                        ) : (
                            <h4>No Staff members available</h4>
                        )}
                    </div>
                </div>
            </div>
        </section>
    );
};

Staff.layout = page => (
    <Layout children={page} title="Staff | Kampala Hospital" />
);

export default Staff;
