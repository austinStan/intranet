import React from "react";
import Layout from "../Layouts/Layout";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

export default function SingleDepartment({ department, staff }) {
    // console.log(department);
    // console.log(staff);

    nProgress.start();

    const members = staff.filter(p => p.department === department.id);
    // console.log(members);

    return (
        <section style={{}}>
            <div className="banner">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">Home</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="/">Departments</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            {department.name ? department.name : ""}
                        </li>
                    </ol>
                </nav>
            </div>

            <div className="container">
                <h3 className="single-page-headings">
                    {department.name ? department.name : ""}
                </h3>

                <div className="row">
                    {members && members.length > 0 ? (
                        <>
                            {members.map(m => (
                                <div className="col-sm-12 col-md-6 col-lg-4 mt-5">
                                    <div className="staff-component">
                                        <img
                                            className=" img-fluid"
                                            src={m.image ? m.image : m.name}
                                            alt={
                                                m.name
                                                    ? m.name
                                                    : "Staff members name"
                                            }
                                            style={{
                                                borderRadius: "10px",
                                                width: "100%",
                                                height: "250px"
                                            }}
                                        />

                                        <div className="" style={{}}>
                                            <h4 className="text-center mt-2">
                                                {m && m.name ? m.name : ""}
                                            </h4>

                                            <p className="text-center">
                                                {m && m.email ? m.email : ""}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </>
                    ) : (
                        <h3>No Staff Members attached to this department</h3>
                    )}
                </div>
            </div>
        </section>
    );
}

SingleDepartment.layout = page => (
    <Layout children={page} title="Department | Kampala Hospital" />
);
