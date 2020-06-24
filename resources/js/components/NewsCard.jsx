import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";
import ReactHtmlParser from "react-html-parser";

import moment from "moment";

export default function NewsCard({ n }) {
    return (
        <div className="col-sm-12 col-md-6 col-lg-4 mt-3">
            <div
                className="announce-card card-effect"
                style={{ height: "100%", margin: "0 5px" }}
            >
                <img
                    className=" shout-icon"
                    src="/assets/images/icons/paper.svg"
                    alt=""
                    // style={{
                    //     width: "100%",
                    //     height: "100px",
                    //     borderRadius: "10%"
                    // }}
                />

                <InertiaLink
                    href={`news/${n ? n.id : "#"}`}
                    style={{ textDecoration: "none" }}
                >
                    <div className="limit-1-lines mt-3">
                        <div>
                            <h4
                                className="text-center"
                                style={{ color: "#2a9df4" }}
                            >
                                {n ? n.title : ""}
                            </h4>
                        </div>
                    </div>
                </InertiaLink>

                <div className="limit-3-lines mt-3">
                    <div className="text-center">
                        {ReactHtmlParser(n ? n.description : "")}
                    </div>
                </div>

                <h6
                    className="text-center mt-2"
                    style={{
                        fontWeight: "bold",
                        color: "black"
                    }}
                >
                    {n.created_at
                        ? moment(n.created_at).format("MMMM Do YYYY, h:mm a")
                        : ""}
                </h6>
            </div>
        </div>
    );
}
