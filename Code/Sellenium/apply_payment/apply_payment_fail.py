import unittest

from selenium import webdriver
from test_utility import fields, static_data


# These Test could be also used by foreign payment, retrieve money

class ApplyPayment(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_app_pay_not_ok(self):  # Assume Money < Needed
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/apply-pay")
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000", "submit"])[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
