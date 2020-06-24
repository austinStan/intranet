import React from "react";
import ReactHtmlParser from "react-html-parser";
import { InertiaLink } from "@inertiajs/inertia-react";
import moment from "moment";

export default function LatestNewsCard({ n }) {
    return (
        <div>
            <div className="row mt-3 latest-news">
                <div className="col-4">
                    <InertiaLink href={`news/${n.id ? n.id : "#"}`}>
                        <img
                            src="/assets/images/icons/news.svg"
                            alt=""
                            style={{
                                width: "100%",
                                height: "100px",
                                borderRadius: "10%"
                            }}
                        />
                    </InertiaLink>
                </div>

                <div className="col-8">
                    <div className="limit-1-lines">
                        <InertiaLink href={`news/${n.id ? n.id : "#"}`}>
                            <h4 style={{ fontWeight: "bold" }}>
                                {n.title ? n.title : ""}
                            </h4>
                        </InertiaLink>
                    </div>

                    <div className="limit-2-lines">
                        <div>
                            {ReactHtmlParser(
                                n.description ? n.description : ""
                            )}
                        </div>
                    </div>

                    <small style={{ color: "#2a9df4" }}>
                        {n.created_at
                            ? moment(n.created_at).format(
                                  "MMMM Do YYYY, h:mm:ss a"
                              )
                            : ""}
                    </small>
                </div>
            </div>
        </div>
    );
}
