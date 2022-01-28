export const redirectTo = (path) => {
  window.location.href = `${process.env.MIX_APP_URL}/${path}`;
}
