import React, { useEffect } from "react";
import Layout from "../Layouts/Layout";

import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

function WallOfFame({ famous_employees }) {
    // console.log(famous_employees);

    nProgress.start();
    // useEffect(() => {

    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);

    return (
        <section style={{}}>
            <div>
                <Banner title="Wall Of Fame" />

                <div className="">
                    <nav aria-label="breadcrumb ">
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item active">
                                <a href="/walloffame" aria-current="page">
                                    Wall Of Fame
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div>
                <div className="" style={{ margin: "0 8%" }}>
                    <div className="row">
                        <div className="col-sm-12 col-md-3">
                            <Sidebar />
                        </div>

                        <div className="col-sm-12 col-md-9 mt-5">
                            <h2 className="single-page-headings">
                                Wall Of Fame
                            </h2>

                            <div className="row">
                                {famous_employees &&
                                famous_employees.length > 0 ? (
                                    <>
                                        {famous_employees.map(employee => (
                                            <div className="mt-5 col-sm-12 col-lg-4">
                                                <h2
                                                    className="text-center"
                                                    style={{
                                                        color: "#2a9df4"
                                                    }}
                                                >
                                                    Employee Of The{" "}
                                                    {employee.duration
                                                        ? employee.duration
                                                        : ""}
                                                </h2>

                                                <div
                                                    style={{
                                                        padding: "20px",
                                                        width: "100%",
                                                        margin: "auto"
                                                    }}
                                                >
                                                    <img
                                                        className="img-fluid"
                                                        src={
                                                            employee.image
                                                                ? employee.image
                                                                : ""
                                                        }
                                                        alt={
                                                            employee.name
                                                                ? employee.name
                                                                : ""
                                                        }
                                                        style={{
                                                            width: "100%",
                                                            height: "300px",
                                                            margin: "auto"
                                                        }}
                                                    />

                                                    <div>
                                                        {/* <img
                        src={employee.}
                        className="d-block w-100"
                        alt="..."
                    /> */}
                                                        <h2 className="text-center">
                                                            {employee.name
                                                                ? employee.name
                                                                : ""}
                                                        </h2>

                                                        <h5 className="text-center">
                                                            {employee.email
                                                                ? employee.email
                                                                : ""}
                                                        </h5>

                                                        <h5 className="text-center">
                                                            {employee.department
                                                                ? employee.department
                                                                : ""}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        ))}
                                    </>
                                ) : (
                                    <h3>No Famous Staff</h3>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

WallOfFame.layout = page => (
    <Layout children={page} title="Wall Of Fame | Kampala Hospital" />
);

export default WallOfFame;
